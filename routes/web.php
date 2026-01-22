<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\IsAdmin;
use App\Models\Book;
use App\Models\Category;
use App\Models\Loan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- HALAMAN DEPAN (WELCOME) ---
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

// --- ROUTES UNTUK USER YANG SUDAH LOGIN ---
Route::middleware(['auth', 'verified'])->group(function () {

    // --- DASHBOARD CONTROLLER (Logic Pemisah Admin & Siswa) ---
    Route::get('/dashboard', function (Request $request) {
        
        // 1. JIKA ADMIN: Tampilkan Dashboard Admin
        if (auth()->user()->role === 'admin') {
            return view('admin.dashboard');
        }

        // 2. JIKA SISWA: Siapkan Data & Tampilkan Dashboard Siswa
        
        // A. Ambil Kategori untuk Filter Pills
        $categories = Category::all();

        // B. Query Buku (Eager Load Category biar cepat)
        $query = Book::with('category');

        // Logic Pencarian (Judul, Penulis, Penerbit)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('writer', 'like', '%' . $search . '%')
                  ->orWhere('publisher', 'like', '%' . $search . '%');
            });
        }

        // Logic Filter Kategori
        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Ambil Data Buku (Pagination 8 item per halaman)
        $books = $query->latest()->paginate(8)->withQueryString();

        // C. Data Peminjaman Aktif User (Current Session)
        $myActiveLoans = Loan::where('user_id', auth()->id())
                            ->where('status', 'borrowed')
                            ->with('book') // Eager load buku
                            ->get();
        
        // D. Total Riwayat Bacaan
        $totalHistory = Loan::where('user_id', auth()->id())->count();

        // [UPDATE DI SINI] Return ke view 'siswa.dashboard'
        return view('student.dashboard', compact('books', 'myActiveLoans', 'totalHistory', 'categories'));

    })->name('dashboard');


    // --- LOANS (Route Peminjaman Siswa) ---
    Route::post('/loans', [TransactionController::class, 'store'])->name('loans.store');


    // --- ADMIN ONLY ROUTES (Middleware IsAdmin) ---
    Route::middleware([IsAdmin::class])->group(function () {
        // Manajemen Buku (CRUD)
        Route::resource('books', BookController::class);
        
        // Manajemen Transaksi (Sirkulasi)
        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::patch('/transactions/{id}/return', [TransactionController::class, 'returnBook'])->name('transactions.return');
    });


    // --- PROFILE SETTINGS ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';