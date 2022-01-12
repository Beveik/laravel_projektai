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
                <div class="card-header">{{ __('Generate new year') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('byday.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="year_select" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="text" class="form-control @error('year_select') is-invalid @enderror " value="{{ old('year_select') }}" name="year_select" required autofocus>
                                @error('year_select')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sign_select" class="col-md-4 col-form-label text-md-right">{{ __('Zodiac sign') }}</label>

                        <div class="col-md-6">
                            <select class="col-md-6 form-control" name="sign_select">

                               <option value="all">All zodiac signs</option>
                               @foreach($zodiacs as $zodiac)
                               <option value="{{$zodiac->id}}">{{ $zodiac->name}}</option>
                               @endforeach
                            </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Generate') }}
                                </button>


                            </div>
                        </div>
                    </form>
                    <a class="btn btn-secondary " href="{{route('byday.index')}}">Back</a><br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
