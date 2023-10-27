<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\TaskList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;



class TaskListApiController extends Controller
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

        $task_list = [];
        $count = 0;
        $message = "";

        if( $id != null ){
            $task_list = TaskList::where('id', $id)->get();
            $count = TaskList::where('id', $id)->count();
        }else{
            $task_list = TaskList::all();
            $count = TaskList::all()->count();
        }
        
        if( count($task_list) > 0 ) {
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
            "data" => $task_list,
        ]);

    }

    // public function create(){

    //     return view('task-lists.create');

    // }

    public function store(Request $request){
        
        $status = "";
        $count = 0;
        $message = "";

        $input = $request->all();

        $task_list = [];

        $task_list["name"] =  ( isset($input["name"]) && !empty($input["name"]) ) ? $input["name"] : "DEFAULT NAME of Task List";
        $task_list["is_completed"] =  ( isset($input["is_completed"]) && !empty($input["is_completed"]) ) ? $input["is_completed"] : 0;
        $task_list["open_tasks"] =  ( isset($input["open_tasks"]) && !empty($input["open_tasks"]) ) ? $input["open_tasks"] : 0;
        $task_list["completed_tasks"] = ( isset($input["completed_tasks"]) && !empty($input["completed_tasks"]) ) ? $input["completed_tasks"] : 0;
        $task_list["position"] =  ( isset($input["position"]) && !empty($input["position"]) ) ? $input["position"] : 0;
        $task_list["is_completed"] =  ( isset($input["is_completed"]) && !empty($input["is_completed"]) ) ? $input["is_completed"] : 0;
        $task_list["is_trashed"] =  ( isset($input["is_trashed"]) && !empty($input["is_trashed"]) ) ? $input["is_trashed"] : 0;

        // persisting file data into database
        $task_list_id = TaskList::create($task_list)->id;

        if( $task_list_id > 0 ){
            $count++;
            $status = "success";
            $message .= "New insert record. ID : " . $task_list_id;
        }else{
            $status = "fail";
            $message .= "Record was not inserted into database.";
        }

        // Session::flash('task_list_created_message', 'Task List : ' . $task_list_id . ' / ' . $input["task_list_name"] . ' , was created !');   // temp session , for messages on FrontEnd

        // return redirect()->route('task-lists.view');


        return response()->json([
            "status" => $status,
            "count" => $count,
            "message" => $message,
            "data" => $task_list,
        ]);
    
    }





    public function edit(TaskList $task_list){

        return view('task-lists.edit', ['task_list' => $task_list] );

    }


    public function update(Request $request,TaskList $task_list){

        $input = $request->all();
        // $user_id = Auth::id();

        // dd($input);

        $task_list = TaskList::find($task_list->id);

        $task_list->name =  $input["task_list_name"];
        $task_list->open_tasks =  $input["task_list_open_tasks"];
        $task_list->completed_tasks =  $input["task_list_completed_tasks"];

        $task_list->position =  $input["task_list_position"];
        $task_list->is_completed =  $input["task_list_is_completed"];
        $task_list->is_trashed =  $input["task_list_is_trashed"];

        // $this->authorize('update', $task);      // policy check , edit ONLY MY task_list 
        $task_list->save();

        Session::flash('task_list_updated_message', 'Task List: ' . $task_list->id . ' / ' . $input["task_list_name"] . ' , was updated !');   // temp session , for messages on FrontEnd


        return redirect()->route('task-lists.view');


    }








    public function destroy(TaskList $task_list){

        // dd($task_list->id);
        
        $task_list->delete();

        Session::flash('task_list_deleted_message', 'Task : ' . $task_list->id . ' / ' . $task_list->name . ' , was deleted !');   // temp session , for messages on FrontEnd

        return back();

    }



}
