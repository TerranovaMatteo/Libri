@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica Autore</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('authors.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="first_name">Nome</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $author->first_name) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="last_name">Cognome</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $author->last_name) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="birthday">Data di Nascita</label>
                <input type="date" name="birthday" id="birthday" class="form-control"
                       value="{{ old('birthday', $author->birthday ? $author->birthday->format('Y-m-d') : '') }}">
            </div>

            <button type="submit" class="btn btn-success">Aggiorna</button>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
@endsection
