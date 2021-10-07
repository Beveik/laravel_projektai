<h1>Companies</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
        <th>Veiksmai</th>
    </tr>

@foreach ($companies as $company)
    <tr>
         <td>{{ $company->id }}</td>
         <td><a href="{{route('company.show', [$company])}}">{{ $company->name }}</a></td>
        <td>{{ $company->type }}</td>
        <td>{{ $company->description }}</td>
        {{-- <td><a href="index.php?ID=$id">Edit</a></td> --}}
        <td>
            <a href="{{route('company.edit', [$company])}}">Edit</a>
            <form method="POST" action="{{route('company.destroy', [$company]) }}">
                @csrf
                <button type="submit">Delete</button>
                {{-- <a type="submit" --}}
            </form>
        </td>
    </tr>
@endforeach

</table>
