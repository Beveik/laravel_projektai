@extends('layouts.app')

@section('content')

<div class="container">

 <h3>Information about category</h3>
<h5>Category title: {{$category->title}}</h5>
<p>Shop: <a href="{{route('shop.show', [$category->CategoryShop->id] )}}">{{$category->CategoryShop->title}}<a></p>

<p>Description: {{$category->description}}</p>
<p>@if ($products_count==1) This is {{$products_count}} product in this category. @else There are {{$products_count}} products in this category.@endif </p>

<a class="btn btn-secondary" href="{{route('category.pdfcategory', [$category])}}"> Export this category to PDF </a> <br><br>
<a class="btn btn-primary " href="{{route('category.index')}}">All categories</a><br><br>
 <a class="btn btn-secondary " href="{{route('shop.show', [$category->CategoryShop->id] )}}">About shop</a>

</div>

@endsection
