<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required|numeric',
            'stock' => 'required|numeric',
            // UPDATE: Tambahkan 'avif' disini
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048', 
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
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required|numeric',
            'stock' => 'required|numeric',
            // UPDATE: Tambahkan 'avif' disini juga
            'cover' => 'nullable|file|mimes:jpeg,png,jpg,webp,avif|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            if ($book->cover) {
                Storage::disk('public')->delete($book->cover);
            }
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