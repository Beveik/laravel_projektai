
<h2>Information about category: {{$category->title}}</h2>

<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Shop</th>
            <th>Total products</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td> {{$category->id }}</td>
            <td> {{$category->title }}</td>
            <td> {{$category->description }}</td>
            <td> {{$category->CategoryShop->title}}</td>
        </tr>
    <tbody>
</table>

