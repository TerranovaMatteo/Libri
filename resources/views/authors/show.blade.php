@extends('layouts.app')

@section('content')
    <div class="container bg-light py-4 rounded-4">
        <h1 class="mb-4">{{ $author->name }}</h1>

        <!-- Author Image -->
        <div class="row mb-4">

            <!-- Author Info -->
            <div class="col-md-8">
                <p><strong>Data di Nascita:</strong> {{ $author->birthday ? $author->birthday->format('d/m/Y') : 'Non specificata' }}</p>
                <h3>Libri Scritti</h3>
                <ul class="list-group">
                    @foreach ($author->books as $book)
                        <li class="list-group-item">
                            <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none">
                                <strong>{{ $book->title }}</strong>
                            </a>
                            (Categoria: {{ $book->category->name }})
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Back to Authors List Button -->
        <a href="{{ route('authors.index') }}" class="btn btn-secondary mt-3">Torna all'elenco</a>
    </div>
@endsection
