<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Task List </title>
</head>
<body>

    <h1> <a href="{{route('home')}}"> << Home </a> </h1>

    @foreach ($task_list as $list)
        <p> {{ $list->id }} / {{ $list->name }} / {{ $list->open_tasks }} / {{ $list->completed_tasks }} / {{ $list->position }} / {{ $list->is_completed }} / {{ $list->is_trashed }} / {{ $list->created_at }} / {{ $list->updated_at }} / </p>
    @endforeach

    
    
</body>
</html>