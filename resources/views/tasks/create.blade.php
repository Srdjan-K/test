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

                    <h1> Create Task </h1>
    
                    <form method="POST" action="{{route('tasks.store')}}" >
                        
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="task_name">Task Name</label>
                            <input  type="text" 
                                    id="task_name" 
                                    name="task_name" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Task Name">
                        </div>

                        <div class="form-group">
                            <label for="task_is_completed">Task Is Completed [ 0 or 1 ] </label>
                            <input  type="text" 
                                    id="task_is_completed" 
                                    name="task_is_completed" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Task Is Completed">
                        </div>

                        <label for="task_task_list_id">Task List</label>
                        <select     
                            id="task_task_list_id"  
                            name="task_task_list_id"    
                            class="form-control">

                            @foreach ($task_lists as $list)

                                <option value="{{$list->id}}"> {{$list->name}} </option>
                                
                            @endforeach
                            
                        </select>


                        <div class="form-group">
                            <label for="task_position">Task Position [ 0 or 1 or 2 or 3 or ... ] </label>
                            <input  type="text" 
                                    id="task_position" 
                                    name="task_position" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Position">
                        </div>

                        <div class="form-group">
                            <label for="task_start_on">Task Start On [ 2023-10-25 00:00:00 ] </label>
                            <input  type="text" 
                                    id="task_start_on" 
                                    name="task_start_on" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Start On">
                        </div>

                        <div class="form-group">
                            <label for="task_due_on">Task Due On [ 2023-10-28 00:00:00 ] </label>
                            <input  type="text" 
                                    id="task_due_on" 
                                    name="task_due_on" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Due On">
                        </div>

                        <div class="form-group">
                            <label for="task_labels">Task Labels [1,2,3, ...] </label>
                            <input  type="text" 
                                    id="task_labels" 
                                    name="task_labels" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Labels">
                        </div>

                        <div class="form-group">
                            <label for="task_open_subtasks">Task Open Subtasks [ 0 or 1 or 2 or 3 or ... ] </label>
                            <input  type="text" 
                                    id="task_open_subtasks" 
                                    name="task_open_subtasks" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Open Subtasks">
                        </div>

                        <div class="form-group">
                            <label for="task_comments_count">Task Comment Count [ 0 or 1 or 2 or 3 or ... ] </label>
                            <input  type="text" 
                                    id="task_comments_count" 
                                    name="task_comments_count" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Comments Count">
                        </div>

                        <div class="form-group">
                            <label for="task_assignee">Task Assignee [1,2,3 ...] </label>
                            <input  type="text" 
                                    id="task_assignee" 
                                    name="task_assignee" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter User Assignee">
                        </div>

                        <div class="form-group">
                            <label for="task_is_important">Task Is Important [ 0 or 1 ] </label>
                            <input  type="text" 
                                    id="task_is_important" 
                                    name="task_is_important" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Is Important">
                        </div>

                        <div class="form-group">
                            <label for="task_completed_on">Task Completed On [ 2023-10-30 00:00:00 ] </label>
                            <input  type="text" 
                                    id="task_completed_on" 
                                    name="task_completed_on" 
                                    class="form-control"
                                    aria-describedby=""
                                    placeholder="Enter Completed On">
                        </div>
                            

                        <br>    

                        

                        <br>

                        <button type="submit" class="btn btn-primary"> Create Task </button>

                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
