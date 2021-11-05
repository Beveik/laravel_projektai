<h2>Information about author {{$author->name}} {{$author->surname }}</h2>

<table class="styled-table">
    <thead>
        <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Surname </th>
            <th> Total books </th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td> {{$author->id}} </td>
            <td> {{$author->name}} </td>
            <td> {{$author->surname }} </td>
            <td>{{$author->AuthorBooks->count()}}</td>
            <td>
                @foreach ($books as $book)
                {{$book->id}}. {{$book->title}}<br>
                @endforeach
            </td>
        </tr>
    <tbody>
</table>
