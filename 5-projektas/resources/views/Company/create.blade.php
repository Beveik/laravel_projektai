<form action="{{route('company.store')}}" method="POST">
    {{-- metodas tas, kurį nurodėm route --}}
Name: <input type="text" name="company_name">
Type: <input type="text" name="company_type">
Description: <input type="text" name="company_description">
@csrf
<button type="submit" name="add">Add</button>


</form>
