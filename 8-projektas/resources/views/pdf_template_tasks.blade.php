<h1>Tasks export </h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>

    </tr>
    @foreach ($tasks as $task)
        <tr>
            <td> {{$task->id }}</td>
            <td> {{$task->title }}</td>
            <td> {{$task->description }}</td>
            <td> {{$task->TaskType->title }}</td>
            <td> {{$task->start_date }}</td>
            <td> {{$task->end_date }}</td>
            <td> {{$task->TaskOwner->name }} {{$task->TaskOwner->surname }}</td>
        </tr>
    @endforeach
</table>
