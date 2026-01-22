<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category; // Import Model Category
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        // Eager load category agar query lebih efisien
        $books = Book::with('category')->latest()->paginate(10);
        
        return view('books.index', compact('books'));
    }

    public function create()
    {
        // Ambil data kategori untuk dropdown di form create
        $categories = Category::all();
        
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'cover' => 'nullable|file|mimes:jpeg,png,jpg,webp,avif|max:2048', 
        ]);

        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('covers', 'public');
            $validated['cover'] = $path;
        }

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit(Book $book)
    {
        // Ambil data kategori untuk dropdown di form edit
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'cover' => 'nullable|file|mimes:jpeg,png,jpg,webp,avif|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($book->cover) {
                Storage::disk('public')->delete($book->cover);
            }
            // Upload cover baru
            $path = $request->file('cover')->store('covers', 'public');
            $validated['cover'] = $path;
        }

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diupdate');
    }

    public function destroy(Book $book)
    {
        if ($book->cover) {
            Storage::disk('public')->delete($book->cover);
        }
        
        $book->delete();
        
        return redirect()->route('books.index')->with('success', 'Buku dihapus');
    }
}