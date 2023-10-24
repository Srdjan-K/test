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

                    {{ __('You are logged in!') }}

                    <h1> Home Page </h1>

                    <a href="{{route('task-lists.view')}}"> Pregled Lista Taskova </a>
                    <br>
                    <a href="{{route('tasks.view')}}"> Pregled Taskova </a>
        
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
