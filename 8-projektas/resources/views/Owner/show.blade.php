

@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Information about Owner</h1>
<h2>{{$owner->id}}. {{$owner->name}} {{$owner->surname}}</h2>
<p>Email: {{$owner->email}}</p>
<p>Phone: {{$owner->phone}}</p>

<a class="btn btn-secondary" href="{{route('owner.pdfowner', [$owner])}}"> Export this owner to PDF </a> <br><br>
<a class="btn btn-primary " href="{{route('owner.index')}}">Back</a><br>
</div>
@endsection
