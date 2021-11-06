
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Authors</h1>

    <a class="btn btn-primary" href="{{route('author.create')}}">Create new author</a><br>
<br>
    <form action="{{route('author.search')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Enter search key" />

        <button class="btn btn-primary" type="submit">Search</button>
    </form>
    <a class="btn btn-secondary" href="{{route('author.index')}}">Delete search</a><br>
<br>

<table class="table table-striped">
    <tr>
        <th>@sortablelink('id', 'ID')</th>
        <th>@sortablelink('name', 'Name')</th>
        <th>@sortablelink('surname', 'Surname')</th>
        <th>Total books</th>
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
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
@foreach ($authors as $author)
    <tr>
         <td>{{ $author->id }}</td>
        <td>{{ $author->name}}</td>
        <td>{{ $author->surname }}</td>
        <td>{{$author->AuthorBooks->count()}}</td>
        <td> <a class="btn btn-primary" href="{{route('author.show', [$author])}}">Show</a></td>
            <td>    <a class="btn btn-secondary" href="{{route('author.edit', [$author])}}">Edit</a></td>
                <td>
                    <form method="POST" action="{{route('author.destroy', [$author]) }}">
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
                {{-- <a type="submit" --}}
            </form>
        </td>

    </tr>
@endforeach

</table>
{{-- <p>{{$books->count() }} of {{$book->count()}} </p> --}}
{!! $authors->appends(Request::except('page'))->render() !!}
</div>
@endsection
