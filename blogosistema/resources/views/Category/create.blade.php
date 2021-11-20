@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('category.store') }}">
        @csrf
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

        <div class="form-group row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <input type="checkbox" id="postsNew" name="postsNew" value="1" />
                <span>Add new post/s?</span>
            </div>
        </div>
        {{-- 1. pazymiu checkbox
             2. Vieno kliento pridejimo forma ir mygtukas Add More Clients
             3. Paspaudus Add More Clients sekanti forma, mygtukas -
            --}}
        <div class="posts-info d-none">
            <div class="form-group row">
                <div class="col-md-4">
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-success" id="add-more-posts">Add More Posts</button>
                </div>
            </div>
            <div class="post">
                <div class="form-group row">
                    <label for="postTitle" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="postTitle[]">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="postDescription" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                    <div class="col-md-6">
                        <textarea name="postDescription[]" class="summernote form-control">
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="postAuthor" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="postAuthor[]">
                    </div>
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

    <div class="post-template d-none">
        <div class="post">
            <div class="form-group row">
                <label for="postTitle" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                <div class="col-md-4">
                    <input type="text" class="form-control" name="postTitle[]">
                </div>
              <div class="col-md-2">
                <button type="button" class="btn btn-danger removePost">Remove Post</button>
            </div>
            </div>

            <div class="form-group row">
                <label for="postDescription" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                <div class="col-md-4">
                    <textarea name="postDescription[]" class="summernote form-control">
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="postAuthor" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                <div class="col-md-4">
                    <input type="text" class="form-control" name="postAuthor[]">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#postsNew").click(function() {
            // console.log("paspaustas");
            $(".posts-info").toggleClass("d-none");
        });
        $("#add-more-posts").click(function() {
            //prie clients-info div turi prikabinti nauja div client
            // $(".clients-info").append("<div class='client'>Div added</div>");
            $(".posts-info").append($(".post-template").html());
            // console.log($(".client-template").html());
        })
        //n+1
        // 1
        // 1
        // 1 x
        $(document).on("click", ".removePost", function() {
            console.log("veikia");
            $(this).parents('.post').remove();
        });
    });
</script>

@endsection
