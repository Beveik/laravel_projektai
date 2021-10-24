@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit task') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('task.update', [$task]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="task_title" class="col-md-4 col-form-label text-md-right">{{ __('Task title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="task_title" value="{{$task->title}}" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="task_description" class="col-md-4 col-form-label text-md-right">{{ __('Task description') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="name" type="text" class="form-control" name="group_description"  required autofocus> --}}
                                <textarea class="summernote" name="task_description">
                                    {{$task->description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="task_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="name" type="text" class="form-control" name="attendGroup_school_id" value="{{$attendGroup->school_id}}" required autofocus> --}}
                                <select class="form-control" name="task_type_id">


                                    @foreach($types as $type)
                                    <option value="{{$type->id}}" @if($type->id==$type->type_id) selected @endif >{{$type->title}}</option>
                                    @endforeach
            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="task_start" class="col-md-4 col-form-label text-md-right">{{ __('Task start date') }}</label>
                            <div class="col-md-6">
                                <input id="task_start" type="text" class="form-control" name="task_start" value="{{$task->start_date}}" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="task_end" class="col-md-4 col-form-label text-md-right">{{ __('Task end date') }}</label>
                            <div class="col-md-6">
                                <input id="task_end" type="text" class="form-control" name="task_end" value="{{$task->end_date}}" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="task_logo" class="col-md-4 col-form-label text-md-right">{{ __('Task logo') }}</label>

                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control" name="task_logo" value="{{$task->logo}}">
                            </div>

                            <img src="{{$task->logo}}" alt='{{$task->title}}' />
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>


                            </div>
                        </div>
                    </form>
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
