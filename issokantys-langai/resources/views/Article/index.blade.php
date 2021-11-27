@extends('layouts.app')

@section('content')
{{-- Modal - isokantis langas
1. Kliento sukurimo forma isokanciame lange x
2. Kliento redagavimo forma isokanciame lange
3. Show funkcionalumas isokanciame lange x
--}}
<div class="container">

<div class="alerts">
</div>

    {{-- data-target =  --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createArticleModal">
        Create New Article Modal
    </button>

    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showArticleModal">
        Show Article Modal
    </button> --}}
<table class="Articles table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Type</th>
        <th>Actions</th>
        <th></th>
    </tr>

    @foreach ($articles as $article)
        <tr class="article{{$article->id}}">
            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{$article->description}}</td>
            <td>{{$article->articleType->title}}</td>
            <td>
                <button type="button" class="btn btn-success show-article" data-articleId='{{$article->id}}'>Show</button>
                <button type="button" class="btn btn-secondary update-article" data-articleId='{{$article->id}}'>Update</button>

            </td>
        <td><input class="delete-article" type="checkbox"  name="articleDelete[]" value="{{$article->id}}" /></td>
    </tr>
        </tr>
    @endforeach
</table>
<button class="btn btn-primary" id="delete-selected">Delete</button>
</div>
<div class="modal fade" id="createArticleModal" tabindex="-1" role="dialog" aria-labelledby="createArticleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create article</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="articleAjaxForm">
                <div class="form-group row">
                    <label for="articleTitle" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                    <div class="col-md-6">
                        <input id="articleTitle" type="text" class="form-control" name="articleTitle">
                        <span class="invalid-feedback articleTitle" role="alert"></span>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="articleDescription" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <textarea id="articleDescription" name="articleDescription" class="summernote form-control">

                        </textarea>
                        <span class="invalid-feedback articleDescription" role="alert"></span>
                    </div>

                </div>
                <div class="form-group row articleType">
                    <label for="articleType" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                    <div class="col-md-6">

                        <select id="articleType" class="form-control" name="articleType">
                            @foreach ($types as $type)
                                <option value="{{$type->id}}"> {{$type->title}}</option>
                            @endforeach
                        </select>
                        <span class="invalid-feedback articleType" role="alert"></span>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary addArticleModal">Add</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="showArticleModal" tabindex="-1" role="dialog" aria-labelledby="showArticleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title show-articleTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h5>Description:</h5>
          <p class="show-articleDescription"></p>
          <h5>Type:</h5>
          <b><p class="show-articleType"></p></b>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="editArticleModal" tabindex="-1" role="dialog" aria-labelledby="editArticleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Article</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="articleAjaxForm">
                <input type='hidden' id='edit-articleId'>
                <div class="form-group row">
                    <label for="articleTitle" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                    <div class="col-md-6">
                        <input id="edit-articleTitle" type="text" class="form-control" name="articleTitle">
                        <span class="invalid-feedback articleTitle" role="alert"></span>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="articleDescription" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <textarea id="edit-articleDescription" name="articleDescription" class="summernote form-control">

                        </textarea>
                        <span class="invalid-feedback articleDescription" role="alert"></span>
                    </div>

                </div>
                <div class="form-group row articleType">
                    <label for="articleType" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                    <div class="col-md-6">

                        <select id="edit-articleType" class="form-control" name="articleType">
                            @foreach ($types as $type)
                                <option value="{{$type->id}}"> {{$type->title}}</option>
                            @endforeach
                        </select>
                        <span class="invalid-feedback articleType" role="alert"></span>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary updateArticleModal">Update</button>
        </div>
      </div>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });
 $(document).ready(function() {
    $(".addArticleModal").click(function() {
        var articleTitle = $("#articleTitle").val();
        var articleDescription = $("#articleDescription").val();
        var articleType = $("#articleType").val();
        $.ajax({
                type: 'POST',
                url: '{{route("article.storeAjax")}}',
                data: {articleTitle:articleTitle, articleDescription:articleDescription, articleType:articleType },
                success: function(data) {
                    if($.isEmptyObject(data.error)) {
                        $(".invalid-feedback").css("display", 'none');
                        $("#createArticleModal").modal("hide");
                        $(".articles").append("<tr><td>"+ data.articleId +"</td><td>"+ data.articleTitle +"</td><td>"+ data.articleDescription +"</td><td>"+ data.articleType +"</td><td>Actions</td></tr>");
                        $(".alerts").append("<div class='alert alert-success'>"+ data.success +"</div");
                        $("#articleTitle").val('');
                        $("#articleDescription").val('');
                    } else {
                        $(".invalid-feedback").css("display", 'none');
                        $.each(data.error, function(key, error){
                            //key = laukelio pavadinimas prie kurio ivyko klaida
                            var errorSpan = '.' + key;
                            $(errorSpan).css('display', 'block');
                            $(errorSpan).html('');
                            $(errorSpan).append('<strong>'+ error + "</strong>");
                        });
                    }
                }
            });
    });
    $(".show-article").click(function() {
       $('#showArticleModal').modal('show');
       var articleId = $(this).attr("data-articleId");
       $.ajax({
                type: 'GET',
                url: '/articles/showAjax/' + articleId ,// action
                success: function(data) {
                    $('.show-articleTitle').html('');
                    $('.show-articleDescription').html('');
                    $('.show-articleType').html('');
                    $('.show-articleTitle').append(data.articleId + '. ' + data.articleTitle );
                    $('.show-articleDescription').append(data.articleDescription);
                    $('.show-articleType').append(data.articleType);
                }
            });
       console.log(articleId);
    });
    $(".update-article").click(function() {
        var articleId = $(this).attr('data-articleId');
        $("#editArticleModal").modal("show");
        $.ajax({
                type: 'GET',
                url: '/articles/editAjax/' + articleId ,// action
                success: function(data) {
                    $("#edit-articleId").val(data.articleId);
                  $("#edit-articleTitle").val(data.articleTitle);
                  $("#edit-articleDescription").val(data.articleDescription);
                  $("#edit-articleType").val(data.articleType);
                }
            });
    })
    $(".updateArticleModal").click(function() {
        var articleId = $("#edit-articleId").val();
        var articleTitle = $("#edit-articleTitle").val();
        var articleDescription = $("#edit-articleDescription").val();
        var articleType = $("#edit-articleType").val();
        $.ajax({
                type: 'POST',
                url: '/articles/updateAjax/' + articleId ,
                data: {articleTitle:articleTitle, articleDescription:articleDescription, articleType:articleType },
                success: function(data) {
                    if($.isEmptyObject(data.error)) {
                        $(".invalid-feedback").css("display", 'none');
                        $("#editArticleModal").modal("hide");
                        $(".alerts").append("<div class='alert alert-success'>"+ data.success +"</div");
                    } else {
                        $(".invalid-feedback").css("display", 'none');
                        $.each(data.error, function(key, error){
                            //key = laukelio pavadinimas prie kurio ivyko klaida
                            var errorSpan = '.' + key;
                            $(errorSpan).css('display', 'block');
                            $(errorSpan).html('');
                            $(errorSpan).append('<strong>'+ error + "</strong>");
                        });
                    }
                }
            });
    })
 });
 $(document).ready(function() {
            $("#delete-selected").click(function() {

                var checkedArticles = [];

                $.each( $(".delete-article:checked"), function( key, article) {
                    checkedArticles[key] = article.value;
                });
                //javascript masyvas => JSON masyvas
                console.log(checkedArticles);
                // [1,7,3]
                $.ajax({
                type: 'POST',
                url: '{{route("article.destroySelected")}}',
                data: { checkedArticles: checkedArticles }, //JSON masyva
                success: function(data) {
                        $(".alerts").toggleClass("d-none");
                        for(var i=0; i<data.messages.length; i++) {
                            $(".alerts").append("<div class='alert alert-"+data.errorsuccess[i] + "'><p>"+ data.messages[i] + "</p></div>")

                            //danger arba success
                            var id = data.success[i];
                            if(data.errorsuccess[i] == "success") {
                                $(".article"+id ).remove();
                            }
                        }
                    }
                });
            })

        // $(".delete-article").click(function(){
        //     var article_Id = $(this).val();

        // })
    })
</script>
@endsection
