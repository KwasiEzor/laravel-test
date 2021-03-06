@extends('layout.app')
@section('content')
    @if ($errors->any())

        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach

    @endif
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf()
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="" cols="30" rows="10">

                        </textarea>
        </div>
        <input type="file" name="avatar" id="avatar" accept="image/png, image/jpg,image/jpeg">
        <div class="form-group">
            <button type="submit">ADD POST</button>
        </div>
    </form>
@endsection
