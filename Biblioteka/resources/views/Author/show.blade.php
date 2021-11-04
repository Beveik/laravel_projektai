

@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Information about Author</h1>
<h3>{{$author->id}}. {{$author->name}} {{$author->surname}}</h3>
<h4>Total books: {{$books_count}}</h4> <br>

@foreach ($books as $book)
{{-- <h5>{{$book->title}}</h5> --}}
    <h5><a href="{{route('book.show', [$book->id] )}}">{{$book->title}} </a></h5>
    <p>{{$book->about}}</p>
    <br>
@endforeach


{{-- <a class="btn btn-secondary" href="{{route('type.pdftype', [$type])}}"> Export this type to PDF </a> <br><br> --}}
<a class="btn btn-primary " href="{{route('author.index')}}">Back</a><br>
</div>
@endsection
