<form action="{{ route('company.update', [$company] ) }}" method="POST">
    {{-- metodas tas, kurį nurodėm route --}}
    Name: <input type="text" name="company_name" value="{{ $company->name }}">
    Type: <input type="text" name="company_type" value="{{ $company->type }}">
    Description: <input type="text" name="company_description" value="{{ $company->description }}">


    @csrf
    <button type="submit" name="edit">Edit</button>




</form>
