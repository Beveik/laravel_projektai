<h1>Books export </h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>ISBN</th>
        <th>Pages</th>
        <th>About</th>
        <th>Author</th>
        {{-- <th>Author's total books</th> --}}
    </tr>

    @foreach ($books as $book)
        <tr>
            <td> {{$book->id }}</td>
            <td> {{$book->title }}</td>
            <td> {{$book->isbn }}</td>
            <td> {{$book->pages }}</td>
            <td> {{$book->about }}</td>
            <td> {{$book->BookAuthor->name }} {{$book->BookAuthor->surname }}</td>
            {{-- <td> {{$author->AuthorBooks->count() }}</td> --}}
        </tr>
    @endforeach

</table>
