

@extends('layouts.app')

@section('content')

<div class="container">

    <h3>Information about Product</h3>
<h5>Product title: {{$product->title}}</h5>
<p>Category: <a href="{{route('category.show', [$product->ProductCategory->id])}}">{{$product->ProductCategory->title}}<a></p>

<p>Excerpt: {{$product->excerpt}}</p>
<p>Description: {{$product->description}}</p>
<p>Price: {{$product->price}} €</p>
<img src="{{$product->image}}" alt='{{$product->title}}' /><br><br>

<a class="btn btn-secondary" href="{{route('product.pdfproduct', [$product])}}"> Export this book to PDF </a> <br><br>
<a class="btn btn-primary " href="{{route('product.index')}}">All products</a><br><br>
<a class="btn btn-secondary " href="{{route('category.show', [$product->ProductCategory->id] )}}">About category</a>
</div>
@endsection
