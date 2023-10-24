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
                    <h2> <a href="{{route('tasks.view')}}"> << Tasks </a> </h2>

                    <h1> Edit Task </h1>
    
                    <form method="POST" action="{{route('tasks.update', $task->id)}}" >
                        
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="task_name">Task Name</label>
                            <input  type="text" 
                                    id="task_name" 
                                    name="task_name" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Task Name"
                                    value="{{ $task->name }}">
                        </div>

                        <div class="form-group">
                            <label for="task_is_completed">Task Is Completed</label>
                            <input  type="text" 
                                    id="task_is_completed" 
                                    name="task_is_completed" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Task Is Completed"
                                    value="{{ $task->is_completed }}">
                        </div>

                        @if ( $task->is_completed == true )
                            <label for="task_task_list_id">Task List [ disabled ] </label>
                            <select     
                                id="task_task_list_id"  
                                name="task_task_list_id"    
                                class="form-control" disabled>
                        @else
                            <label for="task_task_list_id">Task List</label>
                            <select     
                                id="task_task_list_id"  
                                name="task_task_list_id"    
                                class="form-control">
                        @endif

                                @foreach ($task_lists as $list)

                                    @if ( $list->id == $task->task_list_id )
                                        <option value="{{$list->id}}" selected> {{$list->name}} </option>
                                    @else
                                        <option value="{{$list->id}}"> {{$list->name}} </option>
                                    @endif
                                    
                                @endforeach
                                
                            </select>


                        <div class="form-group">
                            <label for="task_position">Task Position</label>
                            <input  type="text" 
                                    id="task_position" 
                                    name="task_position" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Position"
                                    value="{{ $task->position }}">
                        </div>

                        <div class="form-group">
                            <label for="task_start_on">Task Start On</label>
                            <input  type="text" 
                                    id="task_start_on" 
                                    name="task_start_on" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Start On"
                                    value="{{ $task->start_on }}">
                        </div>

                        <div class="form-group">
                            <label for="task_due_on">Task Due On</label>
                            <input  type="text" 
                                    id="task_due_on" 
                                    name="task_due_on" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Due On"
                                    value="{{ $task->due_on }}">
                        </div>

                        <div class="form-group">
                            <label for="task_labels">Task Labels</label>
                            <input  type="text" 
                                    id="task_labels" 
                                    name="task_labels" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Labels"
                                    value="{{ $task->labels }}">
                        </div>

                        <div class="form-group">
                            <label for="task_open_subtasks">Task Open Subtasks</label>
                            <input  type="text" 
                                    id="task_open_subtasks" 
                                    name="task_open_subtasks" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Open Subtasks"
                                    value="{{ $task->open_subtasks }}">
                        </div>

                        <div class="form-group">
                            <label for="task_comments_count">Task Comment Count</label>
                            <input  type="text" 
                                    id="task_comments_count" 
                                    name="task_comments_count" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Comments Count"
                                    value="{{ $task->comments_count }}">
                        </div>

                        <div class="form-group">
                            <label for="task_assignee">Task Assignee</label>
                            <input  type="text" 
                                    id="task_assignee" 
                                    name="task_assignee" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter User Assignee"
                                    value="{{ $task->assignee }}">
                        </div>

                        <div class="form-group">
                            <label for="task_is_important">Task Is Important</label>
                            <input  type="text" 
                                    id="task_is_important" 
                                    name="task_is_important" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Is Important"
                                    value="{{ $task->is_important }}">
                        </div>

                        <div class="form-group">
                            <label for="task_completed_on">Task Completed On</label>
                            <input  type="text" 
                                    id="task_completed_on" 
                                    name="task_completed_on" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Completed On"
                                    value="{{ $task->completed_on }}">
                        </div>
                            

                        <br>    

                        

                        <br>

                        <button type="submit" class="btn btn-primary"> Update Task </button>

                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
