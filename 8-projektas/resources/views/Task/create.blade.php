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


    {{-- kai if'as; jeigu klaida title egizsituoja, vykdomas kazkoks tai kodas --}}
    {{-- atsiranda kintamasis $message -  klaidos zinute --}}

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New task') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('task.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="task_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('task_title') is-invalid @enderror " value="{{ old('task_title') }}" name="task_title" required autofocus>
                                @error('task_title')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="task_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="name" type="text" class="form-control" name="group_description"  required autofocus> --}}
                                <textarea class="summernote" name="task_description" class="form-control @error('task_description') is-invalid @enderror" name="task_description" autofocus>
                                </textarea>
                                @error('task_description')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="task_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="name" type="text" class="form-control" name="attendGroup_school_id" value="{{$attendGroup->school_id}}" required autofocus> --}}
                                <select class="form-control" name="task_type_id" >


                                    @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->title}}</option>
                                    @endforeach
            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="task_start" class="col-md-4 col-form-label text-md-right">{{ __('Start date') }}</label>

                            <div class="col-md-6">
                                <input id="task_start" type="dateTime-local" class="form-control @error('task_start') is-invalid @enderror" name="task_start" value="{{ old('task_start') }}"/>
                                @error('task_start')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="task_end" class="col-md-4 col-form-label text-md-right">{{ __('End date') }}</label>

                            <div class="col-md-6">
                                <input id="task_end" type="dateTime-local" class="form-control @error('task_end') is-invalid @enderror" name="task_end" value="{{ old('task_end') }}"/>
                                @error('task_end')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="task_logo" class="col-md-4 col-form-label text-md-right">{{ __('Task logo') }}</label>

                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control" name="task_logo">
                            </div>
                            @error('logo')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="task_owner_id" class="col-md-4 col-form-label text-md-right">{{ __('Owner') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="name" type="text" class="form-control" name="attendGroup_school_id" value="{{$attendGroup->school_id}}" required autofocus> --}}
                                <select class="form-control" name="task_owner_id" >


                                    @foreach($owners as $owner)
                                    <option value="{{$owner->id}}">{{$owner->name}} {{$owner->surname}}</option>
                                    @endforeach
            </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>


                            </div>
                        </div>
                    </form>
                    <a class="btn btn-secondary " href="{{route('task.index')}}">Back</a><br>
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
