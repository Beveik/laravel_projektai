
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Pagination Settings</h1>
    {{-- <a class="btn btn-secondary" href="{{route('types.pdf')}}"> Export types table to PDF </a> <br><br> --}}
    <a class="btn btn-primary" href="{{route('paginationsetting.create')}}">Create</a><br><br>

    {{-- <form action="{{route('type.search')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Enter search key" />
        <button class="btn btn-primary" type="submit">Search</button>
    </form> --}}

    <table class="table table-striped">
    <tr>
        <th>@sortablelink('id', 'ID')</th>
        <th>@sortablelink('title', 'Title')</th>
        <th>@sortablelink('value', 'Value')</th>
        <th>@sortablelink('visible', 'Visible')</th>
        {{-- <th>yes no</th> --}}
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{session()->get("success_message")}}
    </div>
@endif
@foreach ($paginationSettings as $paginationSetting)
    <tr>
         <td>{{ $paginationSetting->id }}</td>
        <td>{{ $paginationSetting->title}}</td>
        <td>{{ $paginationSetting->value }}</td>
        {{-- <td>{{ $paginationSetting->visible  }}</td> --}}
<td>
        @if($paginationSetting->visible==1) Yes
        @elseif($paginationSetting->visible==0) No
        @endif

    </td>

        <td>
            <a class="btn btn-primary" href="{{route('paginationsetting.show', [$paginationSetting])}}">Show</a>
        </td>
        <td>
            <a class="btn btn-secondary" href="{{route('paginationsetting.edit', [$paginationSetting])}}">Edit</a>
        </td>
         <td>
            <form method="POST" action="{{route('paginationsetting.destroy', [$paginationSetting]) }}">
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>

            </form>
        </td>
    </tr>
@endforeach

</table>
</div>
@endsection
