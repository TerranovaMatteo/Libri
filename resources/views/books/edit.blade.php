@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica Libro</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title">Titolo</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $book->description) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="pages">Numero di Pagine</label>
                <input type="number" name="pages" id="pages" class="form-control" value="{{ old('pages', $book->pages) }}">
            </div>

            <div class="form-group mb-3">
                <label for="author_id">Autore</label>
                <select name="author_id" id="author_id" class="form-control" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="category_id">Categoria</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Aggiorna</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
@endsection
