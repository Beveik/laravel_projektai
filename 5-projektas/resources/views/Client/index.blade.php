<h1>Clients</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Company</th>
        <th>Image</th>
        <th>Veiksmai</th>
    </tr>

@foreach ($clients as $client)
    <tr>
         <td>{{ $client->id }}</td>
        <td><a href="{{route('client.show', [$client])}}">{{ $client->name }}</a></td>
        <td>{{ $client->surname }}</td>
        <td>{{ $client->company_id }}</td>
        <td>{{ $client->image_url }}</td>
        {{-- <td><a href="index.php?ID=$id">Edit</a></td> --}}
        <td>
            <a href="{{route('client.edit', [$client])}}">Edit</a>
            <form method="POST" action="{{route('client.destroy', [$client]) }}">
                @csrf
                <button type="submit">Delete</button>
                {{-- <a type="submit" --}}
            </form>
        </td>
    </tr>
@endforeach

</table>
