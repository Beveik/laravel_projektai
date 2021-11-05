<h1>Authors export </h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Total books</th>

    </tr>
    @foreach ($authors as $author)
        <tr>
            <td> {{$author->id }}</td>
            <td> {{$author->name }}</td>
            <td> {{$author->surname }}</td>
            <td>{{$author->AuthorBooks->count()}}</td>
        </tr>
    @endforeach
</table>
