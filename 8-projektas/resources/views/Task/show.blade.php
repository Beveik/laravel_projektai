

@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Information about Tasks</h1>
<p>Title: {{$task->id}}. {{$task->title}}</p>
<p>Description: {{$task->description}}</p>
<p>Type: {{$task->TaskType->title}}</p>
<p>Start date: {{$task->start_date}}</p>
<p>End date: {{$task->end_date}}</p>
<p>Owner: {{$task->TaskOwner->name}} {{$task->TaskOwner->surname}}</p>
<img src="{{$task->logo}}" alt='{{$task->title}}' /><br><br>

<a class="btn btn-secondary" href="{{route('task.pdftask', [$task])}}"> Export this task to PDF </a> <br><br>
<a class="btn btn-primary " href="{{route('task.index')}}">Back</a><br>
</div>
@endsection
