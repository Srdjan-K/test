<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TaskList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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

        $task_list = TaskList::withTrashed()->get();

        return view('task-lists.task-lists' , [ 'task_list' => $task_list ]);

    }

    public function create(){

        return view('task-lists.create');

    }

    public function store(Request $request){
        
        $input = $request->all();

        $task_list = [];

        $task_list["name"] =  ( !empty($input["task_list_name"]) ) ? $input["task_list_name"] : "DEFAULT NAME of Task List";
        $task_list["is_completed"] =  ( !empty($input["task_list_is_completed"]) ) ? $input["task_list_is_completed"] : 0;
        $task_list["open_tasks"] =  ( !empty($input["task_list_open_tasks"]) ) ? $input["task_list_open_tasks"] : 0;
        $task_list["completed_tasks"] = ( !empty($input["task_list_completed_tasks"]) ) ? $input["task_list_completed_tasks"] : 0;
        $task_list["position"] =  ( !empty($input["task_list_position"]) ) ? $input["task_list_position"] : 0;
        $task_list["is_completed"] =  ( !empty($input["task_list_is_completed"]) ) ? $input["task_list_is_completed"] : 0;
        $task_list["is_trashed"] =  ( !empty($input["task_list_is_trashed"]) ) ? $input["task_list_is_trashed"] : 0;

        // persisting file data into database
        $task_list_id = TaskList::create($task_list)->id;

        Session::flash('task_list_created_message', 'Task List : ' . $task_list_id . ' / ' . $input["task_list_name"] . ' , was created !');   // temp session , for messages on FrontEnd

        return redirect()->route('task-lists.view');
    
    }





    public function edit(TaskList $task_list){

        return view('task-lists.edit', ['task_list' => $task_list] );

    }


    public function update(Request $request,TaskList $task_list){

        $input = $request->all();
        $user_id = Auth::id();

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
        
        $task_list->forceDelete();

        Session::flash('task_list_deleted_message', 'Task : ' . $task_list->id . ' / ' . $task_list->name . ' , was deleted !');   // temp session , for messages on FrontEnd

        return back();

    }

    public function destroy_soft(TaskList $task_list){

        // dd($task_list->id);
        
        $task_list->delete();

        Session::flash('task_list_deleted_message', 'Task : ' . $task_list->id . ' / ' . $task_list->name . ' , was deleted !');   // temp session , for messages on FrontEnd

        return back();

    }

    public function restore($task_list_id){

        // 1.Solution - get through list of object, with PHP
        // $task_list_tashed_all = TaskList::onlyTrashed()->get();
        // $task_list = "";

        // foreach ($task_list_tashed_all as $obj) {
        //     if( $obj->id == $task_list_id ){
        //         $task_list = $obj;
        //     }
        // }

        // TaskList::withTrashed()->find($task_list_id)->restore();

        // dd($task_list);
        
        // ------------------------------

        // 2.Solution - get through list of object, in DataBase directly
        $task_list = TaskList::withTrashed()->find($task_list_id);
        TaskList::withTrashed()->find($task_list_id)->update(['deleted_at' => null]);

        Session::flash('task_list_restored_message', 'Task : ' . $task_list->id . ' / ' . $task_list->name . ' , was RESTORED from Soft Delete !');   // temp session , for messages on FrontEnd

        return back();

    }




}
