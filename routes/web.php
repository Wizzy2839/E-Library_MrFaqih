<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Book;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    // --- DASHBOARD ---
    Route::get('/dashboard', function (Request $request) {
        if (auth()->user()->role === 'admin') {
            return view('dashboard');
        }

        $query = Book::query();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('writer', 'like', '%' . $request->search . '%')
                  ->orWhere('publisher', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filter == 'available') {
            $query->where('stock', '>', 0);
        }

        $books = $query->latest()->paginate(8)->withQueryString();

        return view('dashboard', compact('books'));

    })->name('dashboard');


    // --- LOANS ---
    Route::post('/loans', [TransactionController::class, 'store'])->name('loans.store');


    // --- ADMIN ROUTES ---
    Route::middleware([IsAdmin::class])->group(function () {
        Route::resource('books', BookController::class);
        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        
        // ROUTE EXPORT PDF SUDAH DIHAPUS
        
        Route::patch('/transactions/{id}/return', [TransactionController::class, 'returnBook'])->name('transactions.return');
    });


    // --- PROFILE ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';