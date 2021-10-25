
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Tasks</h1>
    <a class="btn btn-primary" href="{{route('task.create')}}">Create new task</a><br>

    <form action="{{route('task.search')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Enter search key" />
        <button class="btn btn-primary" type="submit">Search</button>
    </form>

    <form action="{{route('task.search')}}" method="GET">
        @csrf
         <select class="form-control" name="task_type_id">
            <option value="404">Choose type</option>
            @foreach($types as $type)
            <option value="{{$type->id}}"
                {{-- @if($type->id==$task->type_id) selected @endif --}}
                >{{$type->title}}</option>
            @endforeach
</select>
<button class="btn btn-primary" type="submit">Filter</button>
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
        <th>@sortablelink('title', 'Title')</th>
        <th>@sortablelink('description', 'Description')</th>
        <th>@sortablelink('type_id', 'Type')</th>
        <th>@sortablelink('start_date', 'Start date')</th>
        <th>@sortablelink('end_date', 'End date')</th>
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
@foreach ($tasks as $task)
    <tr>
         <td>{{ $task->id }}</td>
        <td>{{ $task->title}}</td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->TaskType->title}}</td>
        <td>{{ $task->start_date}}</td>
        <td>{{ $task->end_date }}</td>

        <td>
            <a class="btn btn-primary" href="{{route('task.show', [$task])}}">Show</a>
            <a class="btn btn-secondary" href="{{route('task.edit', [$task])}}">Edit</a>
            <form method="POST" action="{{route('task.destroy', [$task]) }}">
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
                {{-- <a type="submit" --}}
            </form>
        </td>
    </tr>
@endforeach

</table>
{!! $tasks->appends(Request::except('page'))->render() !!}
</div>
@endsection
