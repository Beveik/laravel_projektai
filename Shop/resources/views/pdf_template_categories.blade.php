<h1>Categories export </h1>
<table class="table table-striped">
    <tr>

            <th>ID</th>
            <th>Description</th>
            <th>Shop</th>
            <th>Total products</th>
    </tr>

    @foreach ($categories as $category)
        <tr>
            <td> {{$category->id }}</td>
            <td> {{$category->title }}</td>
            <td> {{$category->description }}</td>
            <td> {{$category->CategoryShop->title}}</td>
        </tr>
    @endforeach

</table>
