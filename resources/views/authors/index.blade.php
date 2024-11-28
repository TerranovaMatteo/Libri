@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Elenco degli Autori</h1>
        <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Aggiungi Autore</a>
        <table class="table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Data di Nascita</th>
                <th>Azioni</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->birthday ? $author->birthday->format('d/m/Y') : 'Non specificata' }}</td>
                    <td>
                        <a href="{{ route('authors.show', $author) }}" class="btn btn-info">Dettagli</a>
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
