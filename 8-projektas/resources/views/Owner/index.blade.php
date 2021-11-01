
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Owners</h1>
    <a class="btn btn-secondary" href="{{route('owners.pdf')}}"> Export Owners table to PDF </a> <br><br>
    <a class="btn btn-primary" href="{{route('owner.create')}}">Create new owner</a><br>

    <form action="{{route('owner.search')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Enter search key" />
        <button class="btn btn-primary" type="submit">Search</button>
    </form>


    {{-- <form action="{{route('task.index')}}" method="GET">
        @csrf
        <select name="collumnname">

            @if ($collumnName == 'id')
                <option value="id" selected>ID</option>
            @else
                <option value="id">ID</option>
            @endif


            @if ($collumnName == 'title')
             <option value="title" selected>Title</option>
            @else
                <option value="title">Title</option>
            @endif

            @if ($collumnName == 'description')
                <option value="description" selected>Description</option>
            @else
                <option value="description">Description</option>
            @endif

            @if ($collumnName == 'type_id')
                <option value="type_id" selected>Type</option>
            @else
                <option value="type_id">Type</option>
            @endif

        </select>

        <select name="sortby">
            @if ($sortby == "asc")
                <option value="asc" selected>ASC</option>
                <option value="desc">DESC</option>
            @else
                <option value="asc">ASC</option>
                <option value="desc" selected>DESC</option>
            @endif
        </select>

        <button class="btn btn-primary" type="submit">SORT</button>

    </form> --}}


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
@if(session()->has('danger_message'))
<div class="alert alert-danger">
    {{session()->get("danger_message")}}
</div>
@endif
@foreach ($owners as $owner)
    <tr>
         <td>{{ $owner->id }}</td>
        <td>{{ $owner->name}}</td>
        <td>{{ $owner->surname }}</td>
        <td>{{ $owner->email}}</td>
        <td>{{ $owner->phone}}</td>
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
<p>{{$owners->count() }} of {{$owner->count()}} </p>
{!! $owners->appends(Request::except('page'))->render() !!}
</div>
@endsection
