

@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Information about Tasks</h1>
<p>Name: {{$task->id}}. {{$task->title}}</p>
<p>Description: {{$task->description}}</p>
<p>Type: {{$task->TaskType->title}}</p>
<p>Start date: {{$task->start_date}}</p>
<p>End date: {{$task->end_date}}</p>
<img src="{{$task->logo}}" alt='{{$task->title}}' />
</div>
@endsection
