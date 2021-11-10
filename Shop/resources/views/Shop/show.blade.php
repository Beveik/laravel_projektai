

@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Information about Shop</h1>
<h3>{{$shop->id}}. {{$shop->title}} <br> {{$shop->description}}</h3><br>
<h4>Contacts: {{$shop->email}}, {{$shop->phone}}<br>
    Country: {{$shop->country}}</h4><br>
<h4>Shop has {{$categories_count}} @if ($categories_count==1) category @else categories @endif </h4> <br>

@foreach ($categories as $category)
{{-- <h5>{{$book->title}}</h5> --}}
    <h5><a href="{{route('category.show', [$category->id] )}}">{{$category->title}} </a></h5>
    <p>{{$category->description}}</p>
    <br>
@endforeach


<a class="btn btn-secondary" href="{{route('shop.pdfshop', [$shop])}}"> Export this shop to PDF </a> <br><br>
<a class="btn btn-primary " href="{{route('shop.index')}}">Back</a><br>
</div>
@endsection
