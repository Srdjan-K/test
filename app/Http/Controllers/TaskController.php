<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class TaskController extends Controller
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

        $tasks = Task::all();

        return view('tasks.tasks' , [ 'tasks' => $tasks ]);

    }

    public function create(){

        $task_lists = TaskList::all();

        return view('tasks.create',  ['task_lists' => $task_lists]);

    }


    public function store(Request $request){
        
        $input = $request->all();
        // $user_id = Auth::id();

        $task = [];

        $task["name"] =  $input["task_name"];
        $task["is_completed"] =  $input["task_is_completed"];
        $task["name"] =  $input["task_name"];
        $task["task_list_id"] =  $input["task_task_list_id"];
        $task["position"] =  $input["task_position"];
        $task["start_on"] =  $input["task_start_on"];
        $task["due_on"] =  $input["task_due_on"];
        $task["labels"] =  $input["task_labels"];
        $task["open_subtasks"] =  $input["task_open_subtasks"];
        $task["comments_count"] =  $input["task_comments_count"];
        $task["assignee"] =  $input["task_assignee"];
        $task["is_important"] =  $input["task_is_important"];
        $task["completed_on"] =  $input["task_completed_on"];

        // persisting file data into database
        $task_id = Task::create($task)->id;

        Session::flash('task_created_message', 'Task : ' . $task_id . ' / ' . $input["task_name"] . ' , was created !');   // temp session , for messages on FrontEnd

        return redirect()->route('tasks.view');
    
    }


    public function edit(Task $task){

        $task_lists = TaskList::all();

        return view('tasks.edit', ['task' => $task, 'task_lists' => $task_lists] );

    }


    public function update(Request $request,Task $task){

        $input = $request->all();
        $user_id = Auth::id();

        // dd($input);

        $task = Task::find($task->id);

        $task->name =  $input["task_name"];
        $task->is_completed =  $input["task_is_completed"];
        $task->name =  $input["task_name"];
        $task->task_list_id =  $input["task_task_list_id"];
        $task->position =  $input["task_position"];
        $task->start_on =  $input["task_start_on"];
        $task->due_on =  $input["task_due_on"];
        $task->labels =  $input["task_labels"];
        $task->open_subtasks =  $input["task_open_subtasks"];
        $task->comments_count =  $input["task_comments_count"];
        $task->assignee =  $input["task_assignee"];
        $task->is_important =  $input["task_is_important"];
        $task->completed_on =  $input["task_completed_on"];

        // $this->authorize('update', $task);      // policy check , edit ONLY MY task 
        $task->save();

        Session::flash('task_updated_message', 'Task : ' . $task->id . ' / ' . $input["task_name"] . ' , was updated !');   // temp session , for messages on FrontEnd


        return redirect()->route('tasks.view');


    }


    public function destroy(Task $task){

        $task->delete();

        Session::flash('task_deleted_message', 'Task : ' . $task->id . ' / ' . $task->name . ' , was deleted !');   // temp session , for messages on FrontEnd

        return back();

    }


}
