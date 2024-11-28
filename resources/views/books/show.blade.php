@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Book Details Section -->
        <article class="detail-book row py-3 px-1 rounded-4">
            <div class="col-md-8">
                <!-- Book Title -->
                <h2 class="mb-3">{{ $book->title }}</h2>

                <!-- Book Description -->
                <div>
                    <p>{{ $book->description ?? 'Descrizione non disponibile.' }}</p>
                </div>

                <!-- Book Metadata: Author, Category, Pages -->
                <div class="border-top mt-2 pt-3">
                    <span class="badge text-bg-secondary">{{ $book->author->name }}</span>
                    <span class="badge text-bg-secondary">{{ $book->category->name }}</span>
                    <span class="badge text-bg-secondary">{{ $book->pages ?? 'Non specificato' }} pagine</span>
                </div>
            </div>
        </article>
    </div>
@endsection

