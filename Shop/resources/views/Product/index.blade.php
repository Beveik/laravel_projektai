@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>

    {{-- <a class="btn btn-primary" href="{{route('product.create')}}">Create new product</a><br> --}}

    <div class="form-group row">
        <div class="col-md-4">
            <button class="btn btn-dark" type="button" id="productsNew" name="productsNew">Create new product</button>
        </div>
    </div>

        <div class="container ajaxForm d-none">
            <div class="form-group row">
                <label for="productTitle" class="col-md-1 col-form-label text-md-left">Title</label>
                <input class="form-control col-md-4 text-md-left" type="text" placeholder="Product title" name="productTitle"
                    id="productTitle" />
                <span class="invalid-feedback productTitle" role="alert">
                </span>
            </div>
            <div class="form-group row">
                <label for="productExcerpt" class="col-md-1 col-form-label text-md-left">Excerpt</label>
                <textarea class="form-control col-md-4" name="productExcerpt" id="productExcerpt"
                    placeholder="Product excerpt">
                    </textarea>
                <span class="invalid-feedback productExcerpt" role="alert">
                </span>
            </div>
            <div class="form-group row">
                <label for="productDescription" class="col-md-1 col-form-label text-md-left">Description</label>
                <textarea class="form-control col-md-4" name="productDescription" id="productDescription"
                    placeholder="Product description">
                    </textarea>
                <span class="invalid-feedback productDescription" role="alert">
                </span>
            </div>
            <div class="form-group row">
                <label for="productPrice" class="col-md-1 col-form-label text-md-left">Price</label>
                <input id="productPrice" type="text" placeholder="00.00" class="form-control col-md-4" name="productPrice">

                <span class="invalid-feedback productPrice" role="alert">
                </span>
            </div>
            <div class="form-group row">
                <label for="productCategoryId" class="col-md-1 col-form-label text-md-left">{{ __('Category') }}</label>


                <select class="form-control col-md-4" name="productCategoryId" id="productCategoryId">
                    @foreach ($categories as $category)
                        <option id="productCategoryId" value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group row">
                <label for="productImage" class="col-md-1 col-form-label text-md-left">{{ __('Image') }}</label>
                <input id="productImage" type="file" class="form-control col-md-4" name="productImage">
                <br>
                <span class="invalid-feedback productImage" role="alert">
                </span>


            </div>
            <div class="form-group row ">
                <div class="col-md-1 col-form-label text-md-left">
                    <button class="btn btn-dark" type="submit" id="add">Add </button>
                    {{-- <button class="btn btn-danger" id="dummyAdd">Dummy Add</button> --}}
                </div>
            </div>
        </div>

        <br>
        <form action="{{ route('product.search') }}" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Enter search key" />

            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        <form class="form-inline" method="GET" action="{{ route('product.index') }}">
            {{-- <form action="{{route('product.index')}}" method="GET"> --}}
            @csrf
            <select class="col-md-2 col-form-label text-md-left form-control" name="product_category_id">
                <option value="404">All categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{-- @if ($type->id == $task->type_id) selected @endif --}}>{{ $category->title }}</option>
                @endforeach
            </select>
            <button class="btn btn-primary" type="submit">Filter</button>
        </form>
        @if (isset($productfilter))
            <a class="btn btn-primary" href="{{ route('product.index') }}">Clear filter</a><br>
        @endif

        <br>
        <form method="GET" action="{{ route('products.pdf') }}">
            @csrf
            <input type="hidden" name="product_category_id" value='{{ $filterpdf }}'>
            {{-- <input type="hidden" name="search" value='{{$searchpdf}}'> --}}
            <button class="btn btn-primary" name="generatePDF" type="submit">Export products to PDF</button>
        </form>

        <br>
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

            @foreach ($products as $product)
                <tr class='product'>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->excerpt }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td><a
                            href="{{ route('category.show', [$product->ProductCategory->id]) }}">{{ $product->ProductCategory->title }}</a>
                    </td>


                    <td> <a class="btn btn-primary" href="{{ route('product.show', [$product]) }}">Show</a></td>
                    <td> <a class="btn btn-secondary" href="{{ route('product.edit', [$product]) }}">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ route('product.destroy', [$product]) }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        {{-- <button class="btn btn-success delete" data-productid="{{ $product->id }}">DELETE AJAX </button> --}}
                    </td>

                </tr>
            @endforeach

        </table>
        {!! $products->appends(Request::except('page'))->render() !!}

    </div>

    <script>
        $(document).ready(function() {

            $("#productsNew").click(function() {
                $(".ajaxForm").toggleClass("d-none");
            });

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                }
            });

            // $(document).on('click', '.delete', function(event) {
            // // $(".delete").click(function() {
            //     $(this).parents('.product').remove();
            //     console.log($(this).attr("data-productid"));
            //     $.ajax({
            //         type: 'POST',
            //         url: '/products/destroy/' + $(this).attr("data-productid"),
            //         success: function(data) {
            //             alert("Deleted");
            //         }
            //     });
        })
        $("#add").click(function() {
            var productTitle = $("#productTitle").val();
            var productExcerpt = $("#productExcerpt").val();
            var productDescription = $("#productDescription").val();
            var productPrice = $("#productPrice").val();
            var productImage = $("#productImage").val();
            var productCategoryId = $("#productCategoryId").val();

            $.ajax({
                type: 'POST',
                url: '{{ route('product.store') }}',
                data: {
                    productTitle: productTitle, productExcerpt: productExcerpt,productDescription: productDescription,productPrice: productPrice,productImage: productImage,productCategoryId: productCategoryId },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".invalid-feedback").css('display', 'none');
                        $("#products").append("<tr class='product'><td>" + data.productID + "</td><td>" + data.productTitle + "</td><td>" + data.productExcerpt + "</td><td>" + data.productDescription + "</td><td>"+data.productPrice+"</td><td>" +data.productImage + "</td><td>" + data.productCategoryId +"</td><td>Actions</td></tr>")
                        $(".ajaxForm").toggleClass("d-none");
                        // alert(data.message);
                        // console.log(data);
                    } else {
                        $(".invalid-feedback").css('display', 'none');
                        $.each(data.error, function(key, error) {
                            var errorSpan = "." + key;
                            $(errorSpan).css('display', 'block');
                            $(errorSpan).html('');
                            $(errorSpan).append("<strong>" + error + "</strong>");
                        });
                    }
                    $("#products").append("<tr><td>"+data.productID+"</td><td>"+data.productTitle+"</td><td>"+data.productExcerpt+"</td><td>"+data.productDescription+"</td><td>"+data.productPrice+"</td><td>"+data.productImage+"</td><td>"+data.productCategoryId+"</td></tr>")
                alert(data.message);
                }
            });

        });
    </script>
@endsection
