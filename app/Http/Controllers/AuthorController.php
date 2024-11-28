<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\AuthorRequest;
use Illuminate\Support\Facades\File;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        $nameParts = explode(' ', $author->name, 2);
        $author->first_name = $nameParts[0];
        $author->last_name = $nameParts[1] ?? '';

        return view('authors.edit', compact('author'));
    }

    public function store(AuthorRequest $request)
    {
        $data = $request->validated();

        // Combine first name and last name
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];

        // Save the author
        Author::create($data);

        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $data = $request->validated();

        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];

        // Update the author
        $author->update($data);

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
