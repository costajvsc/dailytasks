<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dailytasks - Tasks</title>
</head>
<body>
    <table>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Descriptions</th>
        </tr>
        <tr>
            @foreach($tasks as $t)
            <th>{{ $t->id_tasks }}</th>
            <th>{{ $t->title }}</th>
            <th>{{ $t->description }}</th>
            @endforeach
        </tr>
    </table>
</body>
</html>