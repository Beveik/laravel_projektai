
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Posts</h1>
    <a class="btn btn-primary" href="{{route('post.create')}}">Create new post</a><br>
<br>

        <form action="{{route('post.index')}}" method="GET">
        @csrf
         <select class="col-md-2 col-form-label text-md-left form-control" name="post_category_id">
            <option value="404">All categories</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}"
                @if($category->id==$post->category_id) selected @endif
                >{{ $category->title}}</option>
            @endforeach
</select>
<button class="btn btn-primary" type="submit">Filter</button>
@if ($postfilter)
<a class="btn btn-dark" href="{{route('post.index')}}">Clear filter</a>
@endif
</form>

<br>
{{-- <form method="GET" action="{{route('products.pdf')}}">
    @csrf
    <input type="hidden" name="search" value='{{$searchpdf}}'>
    <button class="btn btn-primary" name="generatePDF" type="submit">Export products to PDF</button>
</form> --}}

@if(session()->has('success_message'))
    <div class="alert alert-success">
        {{session()->get("success_message")}}
    </div>
@endif
@if(session()->has('danger_message'))
<div class="alert alert-danger">
    {{session()->get("danger_message")}}
</div>
@endif

  <br>

<table class="table table-striped">
    <tr>
        <th>@sortablelink('id', 'ID')</th>
        <th>@sortablelink('title', 'Title')</th>
        <th>Description</th>
        <th>@sortablelink('category_id', 'Category')</th>
        <th>@sortablelink('author', 'Author')</th>
        <th>Show</th>
        <th>Actions</th>
    </tr>

@foreach ($posts as $post)
    <tr>
         <td>{{ $post->id }}</td>
        <td>{{ $post->title}}</td>
        <td>{{ $post->description }}</td>
        <td><a href="{{route('category.show', [$post->postCategory->id] )}}">{{ $post->postCategory->title }}</a></td>
        <td>{{ $post->author }}</td>

        <td> <a class="btn btn-primary" href="{{route('post.show', [$post])}}">Show</a></td>
            <td>    <a class="btn btn-secondary" href="{{route('post.edit', [$post])}}">Edit</a>
                    <form method="POST" action="{{route('post.destroy', [$post]) }}">
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
                {{-- <a type="submit" --}}
            </form>
        </td>

    </tr>
@endforeach

</table>
{{-- <p>{{$books->count() }} of {{$book->count()}} </p> --}}
{!! $posts->appends(Request::except('page'))->render() !!}
</div>


@endsection
