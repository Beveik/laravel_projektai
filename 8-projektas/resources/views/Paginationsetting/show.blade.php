
@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Information about Pagination setting</h1>

<p>{{ $paginationSetting->id }}.</p>
<p>Title: {{$paginationSetting->title}}</p>
<p>Value: {{$paginationSetting->value}}</p>

<p>Visible: {{$paginationVisible}}</p>

{{-- <a class="btn btn-secondary" href="{{route('paginationsetting.pdftype', [$type])}}"> Export this type to PDF </a> <br><br> --}}
<a class="btn btn-primary " href="{{route('paginationsetting.index')}}">Back</a><br>
</div>
@endsection
