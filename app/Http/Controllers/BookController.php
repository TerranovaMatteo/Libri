<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author', 'category')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    public function store(BookRequest $request)
    {
        $data = $request->validated();

        if ($request->has('pages')) {
            $data['pages'] = $request->input('pages');
        }

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();

        if ($request->has('pages')) {
            $data['pages'] = $request->input('pages');
        }

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }


    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
