@extends('layouts.app')

@section('content')
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
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

