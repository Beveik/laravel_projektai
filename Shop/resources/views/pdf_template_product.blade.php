
<h2>Information about {{$product->title}}</h2>

<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Excerpt</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td> {{$product->id }}</td>
            <td> {{$product->title }}</td>
            <td> {{$product->excerpt }}</td>
            <td> {{$product->description }}</td>
            <td> {{$product->price }}</td>
            <td> {{$product->ProductCategory->title}} </td>
        </tr>
    <tbody>
</table>
