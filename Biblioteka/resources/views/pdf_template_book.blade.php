
<h2>Information about book {{$book->title}}</h2>

<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>ISBN</th>
            <th>Pages</th>
            <th>About</th>
            <th>Author</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td> {{$book->id }}</td>
            <td> {{$book->title }}</td>
            <td> {{$book->isbn }}</td>
            <td> {{$book->pages }}</td>
            <td> {{$book->about }}</td>
            <td> {{$book->BookAuthor->name}} {{$book->BookAuthor->surname}} </td>
        </tr>
    <tbody>
</table>

