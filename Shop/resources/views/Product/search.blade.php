
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Products</h1>
    <a class="btn btn-secondary" href="{{route('products.pdf')}}"> Export products table to PDF </a> <br><br>
    <a class="btn btn-primary" href="{{route('product.create')}}">Create new product</a><br>
<br>
    {{-- <form action="{{route('product.search')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Enter search key" />

        <button class="btn btn-primary" type="submit">Search</button>
    </form> --}}
    {{-- <form action="{{route('product.search')}}" method="GET">
        @csrf
         <select class="col-md-2 col-form-label text-md-left form-control" name="task_type_id">
            <option value="404">All types</option>
            @foreach($types as $type)
            <option value="{{$type->id}}"
                @if($type->id==$task->type_id) selected @endif
                >{{ $type->title}}</option>
            @endforeach
</select>

<select class="col-md-2 col-form-label text-md-left form-control" name="pagination">
    @foreach($paginationSettings as $paginationSetting)
    @if ($paginationSetting->visible==1)
    <option value="{{$paginationSetting->value}}"
        @if(isset($paginationSetting->value)) selected @endif
        >{{$paginationSetting->title}}</option>
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
        <th>Excerpt</th>
        <th>Description</th>
        <th>@sortablelink('price', 'Price')</th>
        <th>@sortablelink('category_id', 'Category')</th>
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
@foreach ($products as $product)
    <tr>
         <td>{{ $product->id }}</td>
        <td>{{ $product->title}}</td>
        <td>{{ $product->excerpt }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->price}}</td>
        <td><a href="{{route('category.show', [$product->ProductCategory->id] )}}">{{ $product->ProductCategory->title }}</a></td>


        <td> <a class="btn btn-primary" href="{{route('product.show', [$product])}}">Show</a></td>
            <td>    <a class="btn btn-secondary" href="{{route('product.edit', [$product])}}">Edit</a></td>
                <td>
                    <form method="POST" action="{{route('product.destroy', [$product]) }}">
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
                {{-- <a type="submit" --}}
            </form>
        </td>

    </tr>
@endforeach

</table>
{{-- <p>{{$books->count() }} of {{$book->count()}} </p> --}}
{!! $products->appends(Request::except('page'))->render() !!}
</div>
@endsection
