
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Categories</h1>
    <a class="btn btn-secondary" href="{{route('categories.pdf')}}"> Export categories table to PDF </a> <br><br>
    <a class="btn btn-primary" href="{{route('category.create')}}">Create new category</a><br>
<br>
    <form action="{{route('category.search')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Enter search key" />

        <button class="btn btn-primary" type="submit">Search</button>
    </form>
    <form action="{{route('category.search')}}" method="GET">
        @csrf
         <select class="col-md-2 col-form-label text-md-left form-control" name="category_shop_id">
            <option value="404">All shops</option>
            @foreach($shops as $shop)
            <option value="{{$shop->id}}"
                @if($shop->id==$category->shop_id) selected @endif
                >{{ $shop->title}}</option>
            @endforeach
</select>

{{-- <select class="col-md-2 col-form-label text-md-left form-control" name="pagination">
    @foreach($paginationSettings as $paginationSetting)
    @if ($paginationSetting->visible==1)
    <option value="{{$paginationSetting->value}}"
        @if(isset($paginationSetting->value)) selected @endif
        >{{$paginationSetting->title}}</option>
        @endif
    @endforeach
</select> --}}

<button class="btn btn-primary" type="submit">Filter</button>
</form><br>
{{-- @if (isset($request->search) || isset($request->category_shop_id) && ($request->category_shop_id)!="404") --}}
    <a class="btn btn-primary" href="{{route('category.index')}}">Clear</a><br>
{{-- @endif --}}
<br>



<table class="table table-striped">
    <tr>
        <th>@sortablelink('id', 'ID')</th>
        <th>@sortablelink('title', 'Title')</th>
        <th>Description</th>
        <th>@sortablelink('shop_id', 'Shop')</th>
        <th>Total products</th>
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
@foreach ($categories as $category)
    <tr>
         <td>{{ $category->id }}</td>
        <td>{{ $category->title}}</td>
        <td>{{ $category->description }}</td>
        <td><a href="{{route('shop.show', [$category->CategoryShop->id] )}}">{{ $category->CategoryShop->title }}</a></td>
        <td>{{$category->CategoryProducts->count()}}</td>

        <td> <a class="btn btn-primary" href="{{route('category.show', [$category])}}">Show</a></td>
            <td>    <a class="btn btn-secondary" href="{{route('category.edit', [$category])}}">Edit</a></td>
                <td>
                    <form method="POST" action="{{route('category.destroy', [$category]) }}">
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
                {{-- <a type="submit" --}}
            </form>
        </td>

    </tr>
@endforeach

</table>
{{-- <p>{{$books->count() }} of {{$book->count()}} </p> --}}
{!! $categories->appends(Request::except('page'))->render() !!}
</div>
@endsection
