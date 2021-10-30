
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Owners</h1>

    <a class="btn btn-primary" href="{{route('owner.create')}}">Create</a><br>

    <form action="{{route('owner.search')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Enter search key" />
        <button class="btn btn-primary" type="submit">Search</button>
    </form>

    <table class="table table-striped">
    <tr>
        <th>@sortablelink('id', 'ID')</th>
        <th>@sortablelink('name', 'Name')</th>
        <th>@sortablelink('surname', 'Surname')</th>
        <th>@sortablelink('email', 'Email')</th>
        <th>@sortablelink('phone', 'Phone')</th>
        <th>Actions</th>
    </tr>
    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{session()->get("success_message")}}
    </div>
@endif
@foreach ($owners as $owner)
    <tr>
         <td>{{ $owner->id }}</td>
        <td>{{ $owner->name}}</td>
        <td>{{ $owner->surname }}</td>
        <td>{{ $owner->email}}</td>
        <td>{{ $owner->phone }}</td>
        <td>
            <a class="btn btn-primary" href="{{route('owner.show', [$owner])}}">Show</a>
            <a class="btn btn-secondary" href="{{route('owner.edit', [$owner])}}">Edit</a>
            <form method="POST" action="{{route('owner.destroy', [$owner]) }}">
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
