<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TaskList;


class TaskListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $task_list = TaskList::all();

        return view('task-lists' , [ 'task_list' => $task_list ]);

    }


}
