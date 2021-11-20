@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container-show">
 <h3><b>{{$category->title}}</b></h3>

<h5><b>Description:</b> {{$category->description}}</h5>
{{-- <p>@if ($posts_count==1) This is {{$posts_count}} product in this category. @else There are {{$posts_count}} products in this category.@endif </p> --}}

{{-- <a class="btn btn-secondary" href="{{route('category.pdfcategory', [$category])}}"> Export this category to PDF </a> <br><br> --}}
<br>

@if ($posts_count != 0)
<h5 class="posts-list">Posts list:</h5>

    @foreach ($posts as $post)
    <div class="form-inline row">
    <div class="form-group col-md-4 ">
        <table class="table table-striped">

                <tr><th><h4>{{$post->id}}. {{$post->title}}</h4> </th></tr>
                <tr>
        <td> <p><b>Author: </b>{{$post->author}}</p>
        <p><p><b>About: </b>{{$post->description}}</p>
        <button class="btn btn-dark postDelete" data-postid="{{$post->id}}">DELETE</button>
    </td>  </tr>
        </table>
    </div>
   </div>
    @endforeach

@else
<div class="alert alert-danger">
    <p>The category has no posts</p>
</div>
@endif
{{-- <div class="form-group row"> --}}

{{-- </div> --}}
</div>
<script>
$.ajaxSetup({
headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function() {
$(".postDelete").click(function() {
    var postID = $(this).attr("data-postid");
    $(this).parents(".post").remove();
    //ajax
    //route(client.destroyAjax,[$client])
    $.ajax({
        type: 'POST',
        url: '/posts/deleteAjax/' + postID ,// action
        success: function(data) {
            alert(data.success);
            console.log(data.posts_count);
            if(data.posts_count == 0) {
                $(".posts").remove();
                $(".posts-list").remove();
                $(".container-show").append("<div class='alert alert-danger'><p>The category has no posts.</p></div> ")
                //
            }
        }
    });
});
});
</script>
<a class="btn btn-primary " href="{{route('category.index')}}">Back to all categories</a><br><br>
</div>
@endsection
