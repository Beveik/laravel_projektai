
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New clients') }}</div>

                <div class="card-body">

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
    <form method="get" action="{{route('client.createclients')}}">
        <input type="text" name="clientsCount" value="{{$clientsCount}}">
        <button class="btn btn-primary " type="submit">Add empty client fields</button>
    </form>

    <form method="get" action="{{route('client.createclients')}}">
        <input type="text" name="clientsCount" value="{{$clientsCount}}" hidden>
        <button class="btn btn-secondary " type="submit" name="clientAdd" value="plus">+</button>
        <button class="btn btn-secondary " type="submit" name="clientAdd" value="minus">-</button>
    </form>
<br>

{{-- 1. jeigu pridesime elementus su javascript, galesim prideti ju kiek norim,
    nes backendas sugeba suskaiciuoti ir per inspect pridetus elementus
--}}

{{-- 2. Ivesti kazkoki kintamaji nuo kurio priklauso kiek laukeliu yra atvaizduojama
    create.blade.php formoje
--}}

    {{-- <form method="get" action="{{route('client.createclients')}}">
        <input type="text" name="clientsCount" value="{{$clientsCount}}">
        <button type="submit">Create</button>
    </form> --}}



    {{-- <div class="addFields">
        <button class="btn btn-primary" id="addFields">Add Fields </button>
    </div> --}}

    <form method="post" action="{{route("client.storeclients")}}">

        @csrf

            <div class="dynamicFields">

                @for ($i=0; $i<$clientsCount; $i++ )

                <div class="client">
                    <div class="card">
                    <div class="card-header">{{ __(($i+1).'. CLIENT:') }}</div><br>
                    {{-- <label for="client_name" class="col-md-4 col-form-label text-md-right">{{ __(($i+1).'. CLIENT:') }}</label> --}}
                    <div class="form-group row">
                        <label for="client_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                    <input type="text" name="clientName[][name]" />
                    @error("clientName.".$i.".name")
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="client_surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                <div class="col-md-6">
                    <input type="text" name="clientSurname[][surname]" />
                    @error("clientSurname.".$i.".surname")
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="client_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <textarea name="clientDescription[][description]"></textarea>
                    @error("clientDescription.".$i.".description")
                        {{$message}}
                    @enderror
                </div>
            </div>
                    {{-- <button type="button" class="btn btn-danger remove-product">-</button> --}}
                </div>
            </div>
<br>
                @endfor
            </div>
            {{-- @error("productTitle")
                {{$message}}
            @enderror --}}
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>
        {{-- <button type="submit">Add</button> --}}
    </form>


</div>

</div><br>
<a class="btn btn-secondary " href="{{route('client.index')}}">Back</a><br>
</div>
</div>


@endsection
