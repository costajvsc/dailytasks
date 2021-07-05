<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dailytasks - Tasks</title>
</head>
<body>
    <form action="/tasks" method="post">
        <h3>Create Tasks</h3>
        @csrf
        <input type="text" name="title" max-length="15" placeholder="Send email">
        <input type="text" name="description" max-length="255" placeholder="Send email to apply programmer job">
        <button type="submit">Enviar</button>
    </form>
    <table>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Descriptions</th>
        </tr>
        @foreach($tasks as $t)
            <tr>
                <th>{{ $t->id_tasks }}</th>
                <th>{{ $t->title }}</th>
                <th>{{ $t->description }}</th>
            </tr>
        @endforeach
    </table>
</body>
</html>