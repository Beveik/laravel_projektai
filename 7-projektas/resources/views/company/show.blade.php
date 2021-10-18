
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Information about company</h1>

<p>{{$company->id}}. {{$company->title}}</p>
<p>{{$company->description}}</p>
<p><img src="{{$company->logo}}"></p>

</div>

@endsection
