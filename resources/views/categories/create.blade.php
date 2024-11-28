@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Aggiungi una Nuova Categoria</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome Categoria</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection
