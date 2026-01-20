<?php
namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    // Admin: Lihat Daftar Peminjaman
    public function index() {
        $loans = Loan::with(['user', 'book'])->latest()->get();
        return view('loans.index', compact('loans'));
    }

    // Siswa: Pinjam Buku
    public function store(Request $request) {
        $book = Book::findOrFail($request->book_id);
        
        if($book->stock > 0) {
            Loan::create([
                'user_id' => auth()->id(),
                'book_id' => $book->id,
                'loan_date' => now(),
                'status' => 'borrowed'
            ]);
            $book->decrement('stock'); // Stok berkurang otomatis
            return back()->with('success', 'Berhasil meminjam buku!');
        }
        return back()->with('error', 'Stok buku habis!');
    }

    // Admin: Kembalikan Buku
    public function returnBook(Loan $loan) {
        $loan->update([
            'return_date' => now(),
            'status' => 'returned'
        ]);
        $loan->book->increment('stock'); // Stok bertambah otomatis
        return back()->with('success', 'Buku telah dikembalikan.');
    }
}