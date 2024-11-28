@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Aggiungi un Nuovo Autore</h1>

        <form action="{{ route('authors.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="first_name">Nome</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}">
                @error('first_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name">Cognome</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
                @error('last_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="birthday">Data di Nascita</label>
                <input type="date" name="birthday" id="birthday" class="form-control" value="{{ old('birthday') }}">
                @error('birthday')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection

