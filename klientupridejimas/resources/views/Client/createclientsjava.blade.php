@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New clients') }}</div>

                <div class="card-body">
<div class="addFields">
    <form method="get" action="{{route('client.createclientsjava')}}">
        <input type="text" name="clientsCount" value="{{$clientsCount}}">

   <button class="btn btn-primary" id="addFields">Add Fields </button>
    </form>

</div>

<form method="post" action="{{route("client.storeclientsjava")}}">

    @csrf

        <div class="dynamicFields">
            @for ($i=0; $i<$clientsCount; $i++ )
            <div class="client">
                <div class="clientkazkas">
                <div class="card-header">{{ __(($i+1).'. CLIENT:') }}</div><br>

                <div class="form-group row">
                    <label for="client_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                <input type="text" name="clientName[][name]" />
            </div>
        </div>
        <div class="form-group row">
            <label for="client_surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

            <div class="col-md-6">
                <input type="text" name="clientSurname[][surname]" />

            </div>
        </div>
        <div class="form-group row">
            <label for="client_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

            <div class="col-md-6">
                <textarea name="clientDescription[][description]"></textarea>
        </div>
</div>

<button type="button" class="btn btn-danger remove-client ">Delete</button><br><br>
</div>




@endfor
</div>
</div>


<button type="submit">Add</button>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
<script>
    $(document).ready(function(){
        $("#addFields").click(function() {
            console.log("veikia");
            $(".dynamicFields").append('<div class="client"><div class="card-header">{{ __(($i+1).'. CLIENT:') }}</div><br><div class="form-group row"><label for="client_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label><div class="col-md-6"><input type="text" name="clientName[][name]" /></div></div><div class="form-group row"><label for="client_surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label><div class="col-md-6"><input type="text" name="clientSurname[][surname]" /></div></div><div class="form-group row"><label for="client_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label><div class="col-md-6"><textarea name="clientDescription[][description]"></textarea></div></div><button type="button" class="btn btn-danger remove-client ">Delete</button></div></div>')

        });
        $(document).on('click', '.remove-client', function() {
            $(this).parents('.clientkazkas').remove();
        });
    })
</script>
@endsection

