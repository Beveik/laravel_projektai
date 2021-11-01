<h2>Information about {{$owner->name}} {{$owner->surname }}</h2>

<table class="styled-table">
    <thead>
        <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Surname </th>
            <th> Email </th>
            <th> Phone </th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td> {{$owner->id}} </td>
            <td> {{$owner->name}} </td>
            <td> {{$owner->surname }} </td>
            <td> {{$owner->email }} </td>
            <td> {{$owner->phone }} </td>
        </tr>
    <tbody>
</table>
