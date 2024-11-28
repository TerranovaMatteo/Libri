@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $category->name }}</h1>
        <h3>Libri nella Categoria</h3>
        <ul>
            @foreach ($category->books as $book)
                <li>{{ $book->title }} (Autore: {{ $book->author->name }})</li>
            @endforeach
        </ul>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Torna all'elenco</a>
    </div>
@endsection
