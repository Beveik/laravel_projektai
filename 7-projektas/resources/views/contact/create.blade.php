@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New contact') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="contact_title" class="col-md-4 col-form-label text-md-right">{{ __('contact title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="contact_title" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_phone" class="col-md-4 col-form-label text-md-right">{{ __('contact phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="contact_phone" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_address" class="col-md-4 col-form-label text-md-right">{{ __('contact address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="contact_address" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_email" class="col-md-4 col-form-label text-md-right">{{ __('contact email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="contact_email" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_country" class="col-md-4 col-form-label text-md-right">{{ __('contact country') }}</label>
                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="contact_country" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_city" class="col-md-4 col-form-label text-md-right">{{ __('contact city') }}</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="contact_city" required>

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
