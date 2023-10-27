<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;



class TaskApiController extends Controller
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
    public function index($id=null)
    {
        $tasks = [];
        $count = 0;
        $message = "";

        if( $id != null ){
            $tasks = Task::where('id', $id)->get();
            $count = Task::where('id', $id)->count();
        }else{
            $tasks = Task::all();
            $count = Task::all()->count();
        }
        
        if( count($tasks) > 0 ) {
            $status = "success";
            $message .= "Success. We have results !";
        }else{
            $status = "empty";
            $message .= "Empty. No Results Found . . . ";
        }

        return response()->json([
            "status" => $status,
            "count" => $count,
            "message" => $message,
            "data" => $tasks,
        ]);

    }

    // public function create(){

    //     $task_lists = TaskList::all();

    //     return view('tasks.create',  ['task_lists' => $task_lists]);

    // }


    public function store(Request $request){
        
        $input = $request->all();
        // $user_id = Auth::id();

        $task = [];

        $task["name"] = ( isset($input["name"]) && !empty($input["name"]) ) ? $input["name"] : "DEFAULT TASK NAME";
        $task["is_completed"] = ( isset($input["is_completed"]) && !empty($input["is_completed"]) ) ? $input["is_completed"] : 0;
        $task["task_list_id"] =  ( isset($input["task_list_id"]) && !empty($input["task_list_id"]) ) ? $input["task_list_id"] : 1;
        $task["position"] =  ( isset($input["position"]) && !empty($input["position"]) ) ? $input["position"] : 0;
        $task["start_on"] =  $input["start_on"];
        $task["due_on"] =  $input["due_on"];
        $task["labels"] =  ( isset($input["labels"]) && !empty($input["labels"]) ) ? $input["labels"] : "[]";
        $task["open_subtasks"] =  ( isset($input["open_subtasks"]) && !empty($input["open_subtasks"]) ) ? $input["open_subtasks"] : 0;
        $task["comments_count"] =  ( isset($input["comments_count"]) && !empty($input["comments_count"]) ) ? $input["comments_count"] : 0;
        $task["assignee"] =  ( isset($input["assignee"]) && !empty($input["assignee"]) ) ? $input["assignee"] : "[]";
        $task["is_important"] =  ( isset($input["is_important"]) && !empty($input["is_important"]) ) ? $input["is_important"] : 0;
        $task["completed_on"] =  $input["completed_on"];

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
        // $user_id = Auth::id();

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
