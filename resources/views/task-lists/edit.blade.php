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
                    <h2> <a href="{{route('task-lists.view')}}"> << Task Lists </a> </h2>

                    <h1> Edit Task List </h1>
    
                    <form method="POST" action="{{route('task-lists.update', $task_list->id )}}" >
                        
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="task_list_name">Task List Name</label>
                            <input  type="text" 
                                    id="task_list_name" 
                                    name="task_list_name" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Task List Name"
                                    value="{{$task_list->name}}">
                        </div>

                        <div class="form-group">
                            <label for="task_list_open_tasks">Task List Open Tasks [ 0 or 1 or 2 ... ] </label>
                            <input  type="text" 
                                    id="task_list_open_tasks" 
                                    name="task_list_open_tasks" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Task List Open Tasks"
                                    value="{{$task_list->open_tasks}}">
                        </div>

                        <div class="form-group">
                            <label for="task_list_completed_tasks">Task List Completed Tasks [ 0 or 1 or 2 ... ] </label>
                            <input  type="text" 
                                    id="task_list_completed_tasks" 
                                    name="task_list_completed_tasks" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Task List Completed Tasks"
                                    value="{{$task_list->completed_tasks}}">
                        </div>

                        <div class="form-group">
                            <label for="task_list_position">Task List Position [ 0 or 1 or 2 ... ] </label>
                            <input  type="text" 
                                    id="task_list_position" 
                                    name="task_list_position" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Task List Position"
                                    value="{{$task_list->position}}">
                        </div>

                        <div class="form-group">
                            <label for="task_list_is_completed">Task List - Is Completed [ 0 or 1 ] </label>
                            <input  type="text" 
                                    id="task_list_is_completed" 
                                    name="task_list_is_completed" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Task List Is Completed"
                                    value="{{$task_list->is_completed}}">
                        </div>

                        <div class="form-group">
                            <label for="task_list_is_trashed">Task List - Is Trashed [ 0 or 1 ] </label>
                            <input  type="text" 
                                    id="task_list_is_trashed" 
                                    name="task_list_is_trashed" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Task List Is Trashed"
                                    value="{{$task_list->is_trashed}}">
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary"> Update Task List </button>

                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
