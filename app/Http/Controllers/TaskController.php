<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();

        if(!$tasks){
            return response()->json([
                "message" => "Tasks not founded"
            ]);
        }
        return response()->json([
            "data" => $tasks
        ],200);
    }

    public function show($id){

        $task = Task::find($id);

        if(!$task){
            return response()->json([
                "message" => "Not found this task"
             ]);
        }

        return response()->json([
            "data" => $task
        ],200);

        
    }

     public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','max:50'],
            'desc' => ['string'],
            'priority' => ['integer']
        ]);
 
        $task = new Task;
 
        $task->title = $request->title;
        $task->desc = $request->desc;
        $task->priority = $request->priority;
         $task->user_id = $request->user_id;
 
        $task->save();
 
        return response()->json([
            "message" => "Inserted Successfuly",
            "data" => $task
        ],201);
    }

    public function update(Request $request, $id){

        $request->validate([
            'title' => ['required','max:50'],
            'desc' => ['string'],
            'priority' => ['integer']
        ]);

        $task = Task::find($id);

        if(!$task){
            return response()->json([
                "message" => "Not found this task"
             ]);
        }

        if($request->has('title')){
            $task->title = $request->title;
        }

        if($request->has('desc')){
            $task->desc = $request->desc;
        }

        if($request->has('priority')){
            $task->priority = $request->priority;
        }

        $task->save();
 
        return response()->json([
            "message" => "Updated Successfuly",
            "data" => $task
        ],200);
    }

    public function destroy($id){

        $task = Task::find($id);

        if(!$task){
            return response()->json([
                "message" => "Not found this task"
             ]);
        }

        $task->delete();

        return response()->json([
                "message" => "Task was deleted successfuly !!"
        ],204);
    
    }

    public function getTaskUser($id){

         $task = Task::find($id);
         $user = $task->user;

          return response()->json([
            "data" => $user
        ],200);
    }
}
