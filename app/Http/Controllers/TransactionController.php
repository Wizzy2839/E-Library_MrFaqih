<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionController extends Controller
{
    // Halaman Daftar Sirkulasi (Admin)
    public function index()
    {
        // Ambil data peminjaman, urutkan dari yang terbaru
        // 'with' digunakan untuk Eager Loading (biar query ringan)
        $loans = Loan::with(['user', 'book'])->latest()->paginate(10);
        
        return view('loans.index', compact('loans'));
    }

    // Proses Pinjam Buku (Store)
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $book = Book::findOrFail($request->book_id);

        // 1. Cek Stok Buku
        if ($book->stock < 1) {
            return back()->with('error', 'Stok buku habis!');
        }

        // 2. Cek apakah user sedang meminjam buku yang sama (Optional - biar ga double)
        $isBorrowing = Loan::where('user_id', auth()->id())
                            ->where('book_id', $book->id)
                            ->where('status', 'borrowed')
                            ->exists();

        if ($isBorrowing) {
            return back()->with('error', 'Anda masih meminjam buku ini.');
        }

        // 3. Eksekusi Transaksi (Atomic)
        DB::transaction(function () use ($request, $book) {
            // Kurangi Stok
            $book->decrement('stock');

            // Buat Data Peminjaman
            Loan::create([
                'user_id' => auth()->id(),
                'book_id' => $request->book_id,
                'loan_date' => Carbon::now(),
                'status' => 'borrowed',
            ]);
        });

        return back()->with('success', 'Buku berhasil dipinjam!');
    }

    // Proses Kembalikan Buku (Return)
    public function returnBook($id)
    {
        $loan = Loan::findOrFail($id);

        // Pastikan statusnya masih borrowed
        if ($loan->status !== 'borrowed') {
            return back()->with('error', 'Buku sudah dikembalikan sebelumnya.');
        }

        // Eksekusi Transaksi
        DB::transaction(function () use ($loan) {
            // Update Status Peminjaman
            $loan->update([
                'status' => 'returned',
                'return_date' => Carbon::now(),
            ]);

            // Kembalikan Stok Buku
            $loan->book->increment('stock');
        });

        return back()->with('success', 'Buku berhasil dikembalikan & stok diperbarui.');
    }
}