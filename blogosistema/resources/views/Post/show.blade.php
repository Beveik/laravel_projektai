@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Post information</b></h3><br>
        <h3><b>{{ $post->title }}</b></h3>
        <p>Category: <a class="btn btn-secondary "
                href="{{ route('category.show', [$post->PostCategory->id]) }}">{{ $post->PostCategory->title }}<a></p>

        <p>Description: {{ $post->description }}</p>
        <p>Author: {{ $post->author }}</p>
        <a class="btn btn-primary " href="{{ route('post.index') }}">Back to all posts</a><br><br>

    </div>
@endsection
