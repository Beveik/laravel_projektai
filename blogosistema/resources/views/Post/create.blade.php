@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('post.store') }}">
        @csrf

        <div class="form-group row">
            <label for="postTitle" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

            <div class="col-md-6">
                <input id="postTitle" type="text" class="form-control @error('postTitle') is-invalid @enderror" name="postTitle">

                @error('postTitle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="postDescription" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

            <div class="col-md-6">
                <textarea id="clientDescription" name="postDescription" class="summernote form-control @error('postDescription') is-invalid @enderror">

                </textarea>
                @error('postDescription')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="postAuthor" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

            <div class="col-md-6">
                <input id="postAuthor" type="text" class="form-control @error('postAuthor') is-invalid @enderror" name="postAuthor">

                @error('postAuthor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row postCategory">
            <label for="postCategory" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

            <div class="col-md-6">

                <select id="postCategory" class="form-control @error('postCategory') is-invalid @enderror" name="postCategory">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"> {{$category->title}}</option>
                    @endforeach
                </select>
                @error('postCategory')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- checbox pazymetas - i backenda yra perduodama jo value, 1 --}}
        {{-- checkbox nepazymet - i backenda yra grazinama false --}}
        <div class="form-group row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <input type="checkbox" id="categoryNew" name="categoryNew" value="1" />
                <span>Add new categoory?</span>
            </div>
        </div>
        <div class="category-info d-none">
            <div class="form-group row">
                <label for="categoryTitle" class="col-md-4 col-form-label text-md-right">{{ __('Category Title') }}</label>

                <div class="col-md-6">
                    <input id="categoryTitle" type="text" class="form-control @error('categoryTitle') is-invalid @enderror" name="categoryTitle" >

                    @error('categoryTitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="categoryExcerpt" class="col-md-4 col-form-label text-md-right">{{ __('Category Excerpt') }}</label>

                <div class="col-md-6">
                    <textarea id="categoryExcerpt" name="categoryExcerpt" class="summernote form-control @error('categoryExcerpt') is-invalid @enderror">

                    </textarea>
                    @error('categoryExcerpt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="categoryDescription" class="col-md-4 col-form-label text-md-right">{{ __('Category Description') }}</label>
            <div class="col-md-6">
                <textarea id="categoryDescription" name="categoryDescription" class="summernote form-control @error('categoryDescription') is-invalid @enderror">

                </textarea>
                @error('categoryDescription')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add') }}
                </button>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#categoryNew").click(function() {
            // console.log("paspaustas");
            $(".category-info").toggleClass("d-none");
            $(".PostCategory").toggleClass("d-none");
        });
    });
</script>
@endsection
