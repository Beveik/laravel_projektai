<h1>Products export </h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
            <th>Title</th>
            <th>Excerpt</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
    </tr>

    @foreach ($products as $product)
        <tr>
            <td> {{$product->id }}</td>
            <td> {{$product->title }}</td>
            <td> {{$product->excerpt }}</td>
            <td> {{$product->description }}</td>
            <td> {{$product->price }}</td>
            <td> {{$product->ProductCategory->title}} </td>
        </tr>
    @endforeach

</table>
