

@extends('layouts.app')

@section('content')

<div class="container">

    <h3>Information about Book</h3>
<h5>Book title: {{$book->title}}</h5>
<p>Author: <a href="{{route('author.show', [$book->BookAuthor->id] )}}">{{$book->BookAuthor->name}} {{$book->BookAuthor->name}}<a></p>

<p>Description: {{$book->about}}</p>
<p>Pages: {{$book->pages}}</p>
<p>ISBN: {{$book->isbn}}</p>

<a class="btn btn-secondary" href="{{route('book.pdfbook', [$book])}}"> Export this book to PDF </a> <br><br>
<a class="btn btn-primary " href="{{route('book.index')}}">All books</a><br><br>
<a class="btn btn-secondary " href="{{route('author.show', [$book->BookAuthor->id] )}}">About author</a>
</div>
@endsection
