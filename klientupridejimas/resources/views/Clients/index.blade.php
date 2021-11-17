
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Clients</h1>

    <a class="btn btn-primary" href="{{route('client.createclient')}}">Create 1 client</a><br><br>
    <a class="btn btn-primary" href="{{route('client.createclients')}}">Create clients</a><br><br>
    <a class="btn btn-primary" href="{{route('client.createclientsjava')}}">Create clients Javasript</a><br><br>

    <table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Description</th>
    </tr>
    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{session()->get("success_message")}}
    </div>
@endif
@foreach ($clients as $client)
    <tr>
         <td>{{ $client->id }}</td>
        <td>{{ $client->name}}</td>
        <td>{{ $client->surname}}</td>
        <td>{{ $client->description }}</td>
    </tr>
@endforeach

</table>
</div>
@endsection
