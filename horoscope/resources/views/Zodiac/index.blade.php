
@extends('layouts.app')

@section('content')

<div class="container">

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


    <h1>Zodiacs</h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Date</th>
        <th>Description</th>

    </tr>


@foreach ($zodiacs as $zodiac)
    <tr>
        <td>{{ $zodiac->id }}</td>
        <td><img alt="Qries" src="{{ $zodiac->image}}" width="150"></td>
        <td><a href="{{route('zodiac.show', [$zodiac])}}"><b>{{ $zodiac->name}}</b></a></td>
        <td>{{ $zodiac->dates}}</td>
        <td class="col-md-7">{{ $zodiac->description }}</td>

    </tr>

@endforeach

</table>

</div>
@endsection
