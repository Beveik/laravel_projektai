
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
                <div class="card-header">{{ __('New client') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('client.storeclient' ) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="client_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="client_name" type="text" class="form-control" name="client_name" @error('client_name') is-invalid @enderror  value="{{ old('client_name') }}" required autofocus/>
                                @error('client_name')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="client_surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="value" type="text" class="form-control" name="client_surname" @error('client_surname') is-invalid @enderror  value="{{ old('client_surname') }}" required autofocus/>
                                @error('client_surname')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="client_description" type="text" class="form-control" name="client_description" @error('client_description') is-invalid @enderror  value="{{ old('client_description') }}" required autofocus></textarea>
                                @error('client_description')
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
                    <a class="btn btn-secondary " href="{{route('client.index')}}">Back</a><br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
