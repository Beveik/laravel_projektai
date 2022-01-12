
@extends('layouts.app')

@section('content')

<div class="container">

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

    <br>


    <h1>Days</h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>year</th>
        <th>month</th>
        <th>day</th>
        <th>zodiac_id</th>
        <th>score_id</th>

    </tr>


@foreach ($byDays as $byDay)
    <tr>
        <td>{{ $byDay->id }}</td>
        <td>{{ $byDay->year }}</td>
        <td>{{ $byDay->month }}</td>
        <td>{{ $byDay->day}}</td>
        <td>{{ $byDay->zodiac_id}}</td>
        <td>{{ $byDay->score_id }}</td>

    </tr>

@endforeach

</table>

</div>
@endsection
