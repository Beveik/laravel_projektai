
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Pagination setting') }}</div>

                <div class="card-body">
                    <form method="POSt" action="{{ route('paginationsetting.store' ) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="paginationSetting_title" class="col-md-4 col-form-label text-md-right">{{ __('Pagination setting title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="paginationSetting_title" @error('paginationSetting_title') is-invalid @enderror " value="{{ old('paginationSetting_title') }}" required autofocus>
                                @error('paginationSetting_title')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="paginationSetting_value" class="col-md-4 col-form-label text-md-right">{{ __('Pagination setting value') }}</label>

                            <div class="col-md-6">
                                <input id="value" type="text" class="form-control" name="paginationSetting_value" @error('paginationSetting_value') is-invalid @enderror " value="{{ old('paginationSetting_value') }}" required autofocus>
                                @error('paginationSetting_value')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="paginationSetting_visible" class="col-md-4 col-form-label text-md-right">{{ __('Pagination setting visible') }}</label>
                        <div class="col-md-6">
                            {{-- 1/0 true/false --}}
                            {{-- value/0 value/false  --}}
                            <input type="checkbox" name="paginationSetting_visible" @error('paginationSetting_visible') is-invalid @enderror " value="{{ old('paginationSetting_visible') }}"/>
                            @error('paginationSetting_visible')
                            <span role="alert" class="invalid-feedback">
                                <strong>*{{$message}}</strong>
                            </span>
                        @enderror
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
                    <a class="btn btn-secondary " href="{{route('paginationsetting.index')}}">Back</a><br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
