@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Categories</h1>
        <a class="btn btn-primary" href="{{ route('category.create') }}">Create new category</a><br>
        <br>

        <br>



        <table class="table table-striped">
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('title', 'Title')</th>
                <th>Excerpt</th>
                <th>Description</th>
                <th>Total posts</th>
                <th>Show</th>
                <th>Actions</th>
            </tr>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif
            @if (session()->has('danger_message'))
                <div class="alert alert-danger">
                    {{ session()->get('danger_message') }}
                </div>
            @endif
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->excerpt }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->CategoryPosts->count() }}</td>

                    <td> <a class="btn btn-primary" href="{{ route('category.show', [$category]) }}">Show</a></td>
                    <td> <a class="btn btn-secondary" href="{{ route('category.edit', [$category]) }}">Edit</a>
                        <form method="POST" action="{{ route('category.destroy', [$category]) }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </table>
        {!! $categories->appends(Request::except('page'))->render() !!}
    </div>
@endsection
