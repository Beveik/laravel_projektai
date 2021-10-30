

@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Information about Type</h1>
<p>{{$type->id}}. {{$type->title}}</p>
<p>{{$type->description}}</p>
<a class="btn btn-secondary " href="{{route('type.index')}}">Back</a><br>
</div>
@endsection
