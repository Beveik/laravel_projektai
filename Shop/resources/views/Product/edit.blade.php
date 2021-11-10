@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    {{-- klaidu bus daugau nei 1 --}}

        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <ul>
                <li>{{$error}}</li>
            </ul>
        </div>
        @endforeach
    @endif

book
    {{-- kai if'as; jeigu klaida title egizsituoja, vykdomas kazkoks tai kodas --}}
    {{-- atsiranda kintamasis $message -  klaidos zinute --}}

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('product.update', [$product]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="product_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="product_title" type="text" class="form-control @error('product_title') is-invalid @enderror " value="{{$product->title}}" name="product_title" required autofocus>
                                @error('product_title')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_excerpt" class="col-md-4 col-form-label text-md-right">{{ __('Excerpt') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="name" type="text" class="form-control" name="group_description"  required autofocus> --}}
                                <textarea class="summernote" name="product_excerpt" class="form-control @error('product_excerpt') is-invalid @enderror" name="product_excerpt" autofocus>
                                    {{$product->excerpt}}
                                </textarea>
                                @error('product_excerpt')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="name" type="text" class="form-control" name="group_description"  required autofocus> --}}
                                <textarea class="summernote" name="product_description" class="form-control @error('product_description') is-invalid @enderror" name="product_description" autofocus>
                                    {{$product->description}}
                                </textarea>
                                @error('product_description')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_categoryid" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="name" type="text" class="form-control" name="attendGroup_school_id" value="{{$attendGroup->school_id}}" required autofocus> --}}
                                <select class="form-control" name="product_categoryid" >


                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id==$category->category_id) selected @endif>{{$category->title}}</option>
                                    @endforeach
            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="product_price" type="text" class="form-control @error('product_price') is-invalid @enderror " value="{{$product->price}}" name="product_price" required autofocus>
                                @error('product_price')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="product_image" type="file" class="form-control" name="product_image" value="{{$product->image}}">
                            <br>
                        </div>

                            @error('product_image')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            <img class="col-md-4 col-form-label" src="{{$product->image}}" alt='{{$product->title}}' />
                        </div>
<br>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="reset" value="Reset" class="btn btn-secondary">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>


                            </div>
                        </div>
                    </form>
                    <a class="btn btn-secondary " href="{{route('product.index')}}">Back</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('.summernote').summernote();
    });
</script>
@endsection
