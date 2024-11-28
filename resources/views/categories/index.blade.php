@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Elenco delle Categorie</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Aggiungi Categoria</a>
        <table class="table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Azioni</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-info">Dettagli</a>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
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
