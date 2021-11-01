
<h2>Information about task {{$task->title}}</h2>

<table class="styled-table">
    <thead>
        <tr>
            <th> ID </th>
            <th> Title </th>
            <th> Description </th>
            <th> Type </th>
            <th> Start date </th>
            <th> End date </th>
            <th> Owner </th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td> {{$task->id}} </td>
            <td> {{$task->title}} </td>
            <td> {{$task->description}} </td>
            <td> {{$task->TaskType->title }} </td>
            <td> {{$task->start_date}} </td>
            <td> {{$task->end_date}} </td>
            <td> {{$task->TaskOwner->name}} {{$task->TaskOwner->surname}} </td>
        </tr>
    <tbody>
</table>

