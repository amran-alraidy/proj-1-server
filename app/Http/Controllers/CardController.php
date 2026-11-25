<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            'adress' => ['required'],
            'card_num' => ['required'],
            'user_id' => ['required']
        ]);
 
        $card = new Card;
 
        $card->adress = $request->adress;
        $card->card_num = $request->card_num;
        $card->user_id = $request->user_id;
 
        $card->save();
 
        return response()->json([
            "message" => "Inserted Successfuly",
            "data" => $card
        ],201);
    }

    public function getCardUser($id){

         $card = Card::find($id);
         $user = $card->user;

          return response()->json([
            "data" => $user
        ],200);
    }
}
