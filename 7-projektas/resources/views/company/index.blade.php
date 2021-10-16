@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Companies</h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Contact</th>
        <th>Actions</th>
    </tr>

@foreach ($companies as $company)
    <tr>
         <td>{{ $company->id }}</td>
        <td>{{ $company->title}}</td>
        <td>{{ $company->description }}</td>
        {{-- <td> <a href="{{route('contact.show', [$contact])}}">{{$company->CompanyContact->title }}</a> </td> --}}
        <td>{{$company->CompanyContact->title }}, {{$company->CompanyContact->phone }}</td>
        <td>
            <a class="btn btn-primary" href="{{route('company.show', [$company])}}">Show</a>
            <a class="btn btn-secondary" href="{{route('company.edit', [$company])}}">Edit</a>
            <form method="POST" action="{{route('company.destroy', [$company]) }}">
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
