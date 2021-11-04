
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Authors</h1>

    <a class="btn btn-primary" href="{{route('author.create')}}">Create new book</a><br>
<br>
    {{-- <form action="{{route('book.search')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Enter search key" />

        <button class="btn btn-primary" type="submit">Search</button>
    </form> --}}
    {{-- <form action="{{route('book.search')}}" method="GET"> --}}
        {{-- @csrf --}}
         {{-- <select class="col-md-2 col-form-label text-md-left form-control" name="task_type_id"> --}}
            {{-- <option value="404">All types</option>
            @foreach($types as $type)
            <option value="{{$type->id}}" --}}
                {{-- @if($type->id==$task->type_id) selected @endif --}}
                {{-- >{{ $type->title}}</option>
            @endforeach
</select> --}}

{{-- <select class="col-md-2 col-form-label text-md-left form-control" name="pagination">
    @foreach($paginationSettings as $paginationSetting)
    @if ($paginationSetting->visible==1)
    <option value="{{$paginationSetting->value}}" --}}
        {{-- @if(isset($paginationSetting->value)) selected @endif --}}
        {{-- >{{$paginationSetting->title}}</option>
        @endif
    @endforeach
</select>

<button class="btn btn-primary" type="submit">Filter</button>
</form> --}}
<br>



<table class="table table-striped">
    <tr>
        <th>@sortablelink('id', 'ID')</th>
        <th>@sortablelink('name', 'Name')</th>
        <th>@sortablelink('surname', 'Surname')</th>
        <th>Total books</th>
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
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
@foreach ($authors as $author)
    <tr>
         <td>{{ $author->id }}</td>
        <td>{{ $author->name}}</td>
        <td>{{ $author->surname }}</td>
        <td>{{$author->AuthorBooks->count()}}</td>
        <td> <a class="btn btn-primary" href="{{route('author.show', [$author])}}">Show</a></td>
            <td>    <a class="btn btn-secondary" href="{{route('author.edit', [$author])}}">Edit</a></td>
                <td>
                    <form method="POST" action="{{route('author.destroy', [$author]) }}">
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
                {{-- <a type="submit" --}}
            </form>
        </td>

    </tr>
@endforeach

</table>
{{-- <p>{{$books->count() }} of {{$book->count()}} </p> --}}
{!! $authors->appends(Request::except('page'))->render() !!}
</div>
@endsection
