@extends('layout.app')
@section('content')
    <h3>Listes des articles</h3>

    <a href="{{ route('post.create') }}">Ajouter un post</a>
    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            {{-- {{ dd($post->image) }} --}}
            <div class="card">

                <a href="{{ route('post.show', ['id' => $post->id]) }}">
                    <h5 class="card-title">Titre N°{{ $post->id }} : {{ $post->title }}
                </a>
                </h5>
                <div class="card-body">
                    <p>{{ $post->content }}</p>
                </div>
                <div class="card-footer">
                    <small>Date de publication : {{ $post->created_at->format('d . m . Y') }} </small>
                </div>
            </div>
        @endforeach
    @else
        <p>Aucun post dans la base de données</p>
    @endif
@endsection
