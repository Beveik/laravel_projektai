
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
                <div class="card-header">{{ __('Edit Owner') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('owner.update', [$owner] ) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="owner_name" class="col-md-4 col-form-label text-md-right">{{ __('Owner name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" @error('owner_name') is-invalid @enderror name="owner_name" value="{{$owner->name}}" required autofocus>
                                @error('owner_name')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="owner_surname" class="col-md-4 col-form-label text-md-right">{{ __('Owner surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" @error('owner_surname') is-invalid @enderror name="owner_surname" value="{{$owner->surname}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="owner_email" class="col-md-4 col-form-label text-md-right">{{ __('Owner email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" @error('owner_email') is-invalid @enderror name="owner_email" value="{{$owner->email}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="owner_phone" class="col-md-4 col-form-label text-md-right">{{ __('Owner phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" @error('owner_phone') is-invalid @enderror name="owner_phone" value="{{$owner->phone}}" required>
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
                    <a class="btn btn-secondary " href="{{route('owner.index')}}">Back</a><br>
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
