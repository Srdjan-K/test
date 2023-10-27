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


                    @if( Session::has('task_list_deleted_message') )

                        <div   class="alert alert-success">{{ Session::get('task_list_deleted_message') }}</div>
                    
                    @elseif( Session::has('task_list_created_message') )
                        
                        <div   class="alert alert-success">{{ Session::get('task_list_created_message') }}</div>
                    
                    @elseif( Session::has('task_list_updated_message') )
                        
                        <div   class="alert alert-success">{{ Session::get('task_list_updated_message') }}</div>
            
                    @elseif( Session::has('task_list_restored_message') )
                        
                        <div   class="alert alert-success">{{ Session::get('task_list_restored_message') }}</div>
            
                    @endif


                    

                    <h1> <a href="{{route('home')}}"> << Home </a> /// <a href="{{route('task-lists.create')}}">Create New Task List</a> </h1>

                    @foreach ($task_list as $list)
                        <p> 
                            {{ $list->id }} / 
                            {{ $list->name }} / 
                            {{-- {{ $list->open_tasks }} / 
                            {{ $list->completed_tasks }} / 
                            {{ $list->position }} / 
                            {{ $list->is_completed }} / 
                            {{ $list->is_trashed }} / 
                            {{ $list->created_at }} / 
                            {{ $list->updated_at }} /  --}}

                            <a href="{{route('task-lists.edit',  $list->id )}}">
                                Update
                            </a>
                            /
                            @if ( $list->deleted_at !== null )
                                <span style='color: red;'> [ Soft Deleted ] </span> <a href="{{route('task-lists.delete',  $list->id )}}">Force [ HARD ] Delete</a> /// <a href="{{route('task-lists.restore',  $list->id )}}"> Restore </a>
                            @else
                                <a href="{{route('task-lists.delete.soft',  $list->id )}}">Hide [ Soft ] Delete</a>
                            @endif
                        </p>

                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
