
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Shops</h1>
    <a class="btn btn-secondary" href="{{route('shops.pdf')}}"> Export shops table to PDF </a> <br><br>
    <a class="btn btn-primary" href="{{route('shop.create')}}">Create new shop</a><br>
<br>
    <form action="{{route('shop.search')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Enter search key" />

        <button class="btn btn-primary" type="submit">Search</button>
    </form>
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
        <th>@sortablelink('title', 'Title')</th>
        <th>Description</th>
        <th>Contacts</th>
        <th>@sortablelink('country', 'Country')</th>
        <th>Total categories</th>
        {{-- <th>Total products</th> --}}
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
@foreach ($shops as $shop)
    <tr>
         <td>{{ $shop->id }}</td>
        <td>{{ $shop->title}}</td>
        <td>{{ $shop->description }}</td>
        <td>{{ $shop->email }}, {{ $shop->phone }}</td>
        <td>{{ $shop->country }}</td>
        <td>{{$shop->ShopCategories->count()}}</td>
        {{-- <td>{{$shop->ShopProducts->count()}}</td> --}}
        <td> <a class="btn btn-primary" href="{{route('shop.show', [$shop])}}">Show</a></td>
            <td>    <a class="btn btn-secondary" href="{{route('shop.edit', [$shop])}}">Edit</a></td>
                <td>
                    <form method="POST" action="{{route('shop.destroy', [$shop]) }}">
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
                {{-- <a type="submit" --}}
            </form>
        </td>

    </tr>
@endforeach

</table>
{{-- <p>{{$books->count() }} of {{$book->count()}} </p> --}}
{!! $shops->appends(Request::except('page'))->render() !!}
</div>
@endsection
