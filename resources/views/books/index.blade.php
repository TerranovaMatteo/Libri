@extends('layouts.app')

@section('content')

    <div class="container my-5">
        <div class="text-center mb-5">
            <h1 class="display-4">I miei Libri</h1>
            <p class="lead">Esplora la tua collezione personale di libri.</p>
        </div>

        <div class="row justify-content-center">
            @forelse ($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">
                                <strong>di {{ $book->author->name }}</strong>
                            </p>
                            <div class="mt-2">
                                <span class="badge text-bg-secondary">{{ $book->category->name }}</span>
                            </div>
                            <div class="btn-group mt-3 d-flex justify-content-center" role="group">
                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-light"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-light"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo libro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light"><i class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Non ci sono libri nella tua collezione.</p>
            @endforelse
        </div>
    </div>

@endsection

