
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Types</h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Company</th>
        <th>Actions</th>
    </tr>

@foreach ($types as $type)
    <tr>
         <td>{{ $type->id }}</td>
        <td>{{ $type->title}}</td>
        <td>{{ $type->description }}</td>
        <td>{{ $type->TypeCompany->title }} </td>
        {{-- <td>{{ $type->company_id }}</td> --}}
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
