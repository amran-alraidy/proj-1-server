<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUserCard($id){

        
        // $card = User::find($id)->card;
        $user = User::find($id);
        $card = $user->card;
        
        return response()->json([
            "data" => $card
        ],200);
    }

    public function getUserTasks($id){
        
        // $card = User::find($id)->card;
        $user = User::find($id);
        $tasks = $user->tasks;
        
        return response()->json([
            "data" => $tasks
        ],200);
    }
}
