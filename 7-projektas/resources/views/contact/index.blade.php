@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Contacts</h1>
    <a class="btn btn-primary" href="{{route('contact.create')}}">Create</a><br>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Email</th>
        <th>Country</th>
        <th>City</th>
        <th>Total companies</th>
        <th>Actions</th>
    </tr>

    @if(session()->has('error_message'))
    <div class="alert alert-danger">
        {{session()->get("error_message")}}
    </div>
@endif

@if(session()->has('success_message'))
    <div class="alert alert-success">
        {{session()->get("success_message")}}
    </div>
@endif
@foreach ($contacts as $contact)
    <tr>
         <td>{{ $contact->id }}</td>
        <td>{{ $contact->title}}</td>
        <td>{{ $contact->phone }}</td>
        <td>{{ $contact->address }}</td>
        <td>{{ $contact->email}}</td>
        <td>{{ $contact->country }}</td>
        <td>{{ $contact->city }}</td>
        <td>{{$contact->contactCompanies->count()}}</td>
        {{-- <td> <a href="{{route('contact.show', [$contact])}}">{{$contact->CompanyContact->title }}</a> </td> --}}
        {{-- <td>{{$contact->CompanyContact->title }}, {{$company->CompanyContact->phone }}</td> --}}
        <td>
            <a class="btn btn-primary" href="{{route('contact.show', [$contact])}}">Show</a>
            <a class="btn btn-secondary" href="{{route('contact.edit', [$contact])}}">Edit</a>
            <form method="POST" action="{{route('contact.destroy', [$contact]) }}">
                @csrf
                <buttonū'0+class="btn btn-danger" type="submit">Delete</button>
                {{-- <a type="submit" --}}
            </form>
        </td>
    </tr>
@endforeach

</table>
</div>
@endsection
