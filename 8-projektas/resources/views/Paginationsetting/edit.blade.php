
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Pagination Setting') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('paginationsetting.update', [$paginationSetting] ) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="paginationSetting_title" class="col-md-4 col-form-label text-md-right">{{ __('Pagination setting title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="paginationSetting_title" value="{{$paginationSetting->title}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="paginationSetting_value" class="col-md-4 col-form-label text-md-right">{{ __('Pagination setting value') }}</label>

                            <div class="col-md-6">
                                <input id="value" type="text" class="form-control" name="paginationSetting_value" value="{{$paginationSetting->value}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="paginationSetting_visible" class="col-md-4 col-form-label text-md-right">{{ __('Pagination setting visible') }}</label>
                        <div class="col-md-6">
                            {{-- 1/0 true/false --}}
                            {{-- value/0 value/false  --}}
                            <input type="checkbox" name="paginationSetting_visible" value="$paginationSetting->visible" @if($paginationSetting->visible == 1) checked @endif/>
                        </div>
                    </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-secondary " href="{{route('paginationsetting.index')}}">Back</a><br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
