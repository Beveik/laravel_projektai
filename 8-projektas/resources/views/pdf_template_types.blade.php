<h1>Types export </h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>

    </tr>
    @foreach ($types as $type)
        <tr>
            <td> {{$type->id }}</td>
            <td> {{$type->title }}</td>
            <td> {{$type->description }}</td>

        </tr>
    @endforeach
</table>
