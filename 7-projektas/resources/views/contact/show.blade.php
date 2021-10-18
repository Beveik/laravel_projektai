
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Information about contact</h1>

<p>{{$contact->id}}. {{$contact->title}}</p>
<p>{{$contact->phone}}</p>
<p>{{$contact->address}}</p>
<p>{{$contact->email}}</p>
<p>{{$contact->country}}</p>
<p>{{$contact->city}}</p>

</div>
</div>
@endsection
