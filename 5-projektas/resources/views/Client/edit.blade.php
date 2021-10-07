<form action="{{ route('client.update', [$client] ) }}" method="POST">
    {{-- metodas tas, kurį nurodėm route --}}
    Name: <input type="text" name="client_name" value="{{ $client->name }}">
    Surname: <input type="text" name="client_surname" value="{{ $client->surname }}">
    Username: <input type="text" name="client_username" value="{{ $client->username }}">
    Company_id: <input type="text" name="client_company" value="{{ $client->company_id }}">
    Image_url: <input type="text" name="client_image" value="{{ $client->image_url }}">

    @csrf
    <button type="submit" name="edit">Edit</button>




</form>
