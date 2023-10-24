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

                    @foreach ($task_list as $list)
                        <p> {{ $list->id }} / {{ $list->name }} / {{ $list->open_tasks }} / {{ $list->completed_tasks }} / {{ $list->position }} / {{ $list->is_completed }} / {{ $list->is_trashed }} / {{ $list->created_at }} / {{ $list->updated_at }} / </p>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
