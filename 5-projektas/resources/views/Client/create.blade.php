<form action="{{route('client.store')}}" method="POST">
    {{-- metodas tas, kurį nurodėm route --}}
Name: <input type="text" name="client_name">
Surname: <input type="text" name="client_surname">
Username: <input type="text" name="client_username">
Company: <input type="text" name="client_company">
Image: <input type="text" name="client_image">

@csrf
<button type="submit" name="add">Add</button>


</form>
