@extends('layouts.app')

@section('content')




<style>

    a{
        text-decoration: none;
    }

    .to_do{
        background: lightblue; 
    }

    .in_progress{
        background: orange; 
    }

    .blocked{
        background: red; 
    }

    .ready_for_review{
        background: purple; 
    }

    .testing{
        background: brown; 
    }

    .completed{
        background: green; 
    }

    .default{
        background: brown; 
    }


    .to_do, .in_progress, .blocked, .ready_for_review, .testing, .completed, .default {
        color: white; 
        padding:5px; 
        border-radius: 5px;
    }

</style>




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}

                    @if( Session::has('task_deleted_message') )

                        <div   class="alert alert-success">{{ Session::get('task_deleted_message') }}</div>
                    
                    @elseif( Session::has('task_created_message') )
                        
                        <div   class="alert alert-success">{{ Session::get('task_created_message') }}</div>
                    
                    @elseif( Session::has('task_updated_message') )
                        
                        <div   class="alert alert-success">{{ Session::get('task_updated_message') }}</div>
            
                    @endif



                    <h1> <a href="{{route('home')}}"> << Home </a> /// <a href="{{route('tasks.create')}}">Create New Task</a></h1>

                    @foreach ($tasks as $task)
                        <p> 
                            
                            {{ $task->id }} / 
                            {{ $task->name }} / 
                            {{-- {{ $task->is_completed }} /  --}}
                            
                            @switch($task)
                                @case( $task->task_list_id == 1 && $task->is_completed == false )
                                    <a href="{{route('tasks.edit',  $task->id )}}">
                                        <span class="to_do">
                                            {{ $task->task_list->name }} 
                                        </span> 
                                        / Update
                                    </a>
                                    /
                                    <a href="{{route('tasks.delete',  $task->id )}}">Delete</a>
                                    @break

                                @case( $task->task_list_id == 2 && $task->is_completed == false )
                                    <a href="{{route('tasks.edit',  $task->id )}}">
                                        <span class="in_progress">
                                            {{ $task->task_list->name }} 
                                        </span> / Update
                                    </a>
                                    /
                                    <a href="{{route('tasks.delete',  $task->id )}}">Delete</a>
                                    @break

                                @case( $task->task_list_id == 3 && $task->is_completed == false )
                                    <a href="{{route('tasks.edit',  $task->id )}}">
                                        <span class="blocked">
                                            {{ $task->task_list->name }} 
                                        </span> / Update
                                    </a>
                                    /
                                    <a href="{{route('tasks.delete',  $task->id )}}">Delete</a>
                                    @break

                                @case( $task->task_list_id == 4 && $task->is_completed == false )
                                    <a href="{{route('tasks.edit',  $task->id )}}">
                                        <span class="ready_for_review">
                                            {{ $task->task_list->name }} 
                                        </span> / Update
                                    </a>
                                    /
                                    <a href="{{route('tasks.delete',  $task->id )}}">Delete</a>
                                    @break

                                @case( $task->task_list_id == 5 && $task->is_completed == false )
                                    <a href="{{route('tasks.edit',  $task->id )}}">
                                        <span class="testing">
                                            {{ $task->task_list->name }} 
                                        </span>  / Update
                                    </a>
                                    /
                                    <a href="{{route('tasks.delete',  $task->id )}}">Delete</a>
                                    @break
                                    
                                @case( $task->is_completed == true )
                                    <a href="{{route('tasks.edit',  $task->id )}}">
                                        <span class="completed">
                                            [ {{ $task->task_list->name }} ] >> COMPLETED ! 
                                        </span>  / Update
                                    </a>
                                    /
                                    <a href="{{route('tasks.delete',  $task->id )}}">Delete</a>
                                    @break

                                @default
                                    <a href="{{route('tasks.edit',  $task->id )}}">
                                        <span class="default">
                                            {{ $task->task_list->name }} 
                                        </span> / Update
                                    </a>
                                    /
                                    <a href="{{route('tasks.delete',  $task->id )}}">Delete</a>
                                    
                            @endswitch
                            {{-- {{ $task->position }} / 
                            {{ $task->start_on }} / 
                            {{ $task->due_on }} / 
                            {{ $task->labels }} / 
                            {{ $task->open_subtasks }} / 
                            {{ $task->comments_count }} / 
                            {{ $task->assignee }} / 
                            {{ $task->is_important }} / 
                            {{ $task->completed_on }} / 
                            {{ $task->created_at }} / 
                            {{ $task->updated_at }} /   --}}
                        </p>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

