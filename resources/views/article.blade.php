@extends('layout.app')
@section('content')
    <h3>Détails d'un article</h3>
    <div class="card">

        <h3 class="card-title">Titre N°{{ $post->id }} : {{ $post->title }}</h3>
        <div class="card-body">
            <p> {{ $post->content }}</p>
            <img src={{ Storage::url($post->image->path) }} alt={{ $post->title }} width="200px">

        </div>
        <div class="card-footer">
            <small>Date de publication : </small>
        </div>
    </div>
    <div class="comments">
        <h2>Commentaires : </h2>
        <ul class="list-group">
            @forelse ($post->comments as $comment)
                <li>{{ $comment->content }}</li>
            @empty
                <li>Aucun commentaire disponible pour le moment</li>
            @endforelse

        </ul>
    </div>


    {{-- <hr width="100px"> --}}
    <h5>Tags: </h5>
    @forelse ($post->tags as $tag)
        <p>{{ $tag->name }}</p>
    @empty
        <p>Aucun tag disponible</p>
    @endforelse
    {{-- {{ dd($post->imageArtist) }} --}}
    <h5>Artiste :</h5>
    @if ($post->imageArtist)
        <p>Nom de l'artiste : {{ $post->imageArtist->name }}</p>
    @else
        <p>Pas d'artiste</p>
    @endif

    <h5>Commentaires récents:</h5>
    {{-- {{ dd($post->latestComment) }} --}}
    {{-- @if ($post->lastestComment)
        <p> {{ $post->lastestComment->content }}</p>
    @else
        <p>Pas de commentaires récents</p>
    @endif --}}

@endsection
