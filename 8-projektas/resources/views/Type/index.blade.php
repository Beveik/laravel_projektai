
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Types</h1>
    <a class="btn btn-secondary" href="{{route('types.pdf')}}"> Export types table to PDF </a> <br><br>
    <a class="btn btn-primary" href="{{route('type.create')}}">Create</a><br>

    <form action="{{route('type.search')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Enter search key" />
        <button class="btn btn-primary" type="submit">Search</button>
    </form>

    <table class="table table-striped">
    <tr>
        <th>@sortablelink('id', 'ID')</th>
        <th>@sortablelink('title', 'Title')</th>
        <th>@sortablelink('description', 'Description')</th>
        <th>Actions</th>
    </tr>
    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{session()->get("success_message")}}
    </div>
@endif
@foreach ($types as $type)
    <tr>
         <td>{{ $type->id }}</td>
        <td>{{ $type->title}}</td>
        <td>{{ $type->description }}</td>

        <td>
            <a class="btn btn-primary" href="{{route('type.show', [$type])}}">Show</a>
            <a class="btn btn-secondary" href="{{route('type.edit', [$type])}}">Edit</a>
            <form method="POST" action="{{route('type.destroy', [$type]) }}">
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
                {{-- <a type="submit" --}}
            </form>
        </td>
    </tr>
@endforeach

</table>
</div>
@endsection
