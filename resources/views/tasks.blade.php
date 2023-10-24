<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Tasks </title>
</head>
<body>

    <h1> <a href="{{route('home')}}"> << Home </a> </h1>

    @foreach ($tasks as $task)
        <p> 
            {{ $task->id }} / {{ $task->name }} / 
            {{ $task->is_completed }} / 
            <span style="color:white; background: green; padding:5px; border-radius: 5px;">{{ $task->task_list->name }} </span>
                / {{ $task->position }} / 
            {{ $task->start_on }} / {{ $task->due_on }} / {{ $task->labels }} / 
            {{ $task->open_subtasks }} / {{ $task->comments_count }} / {{ $task->assignee }} / 
            {{ $task->is_important }} / {{ $task->completed_on }} / {{ $task->created_at }} / 
            {{ $task->updated_at }} /  
        </p>
    @endforeach

    
    
</body>
</html>