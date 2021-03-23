<?php


namespace App\Http\Services;


use App\Models\Card;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Http\Request;

class CardService
{
    private $model;

    function __construct(Card $card)
    {
        $this -> model = $card;
    }

    public function getCards(Request $request)
    {
        $name = $request->input('name');
        $id = $request->input('id');
        if($id !== null){
            return Card::where('id', '=', $id) -> get();
        } else if($name !== null){
            return Card::where('name', 'like', '%'.$name.'%') -> get();
        } else{
            return Card::all();
        }
    }

    public function getUserCards($id): string
    {
        $count = Collection::where('user_id', '=', $id)
            -> count();
        $res = User::with(['card'])
            ->where('users.id', '=', $id)
            ->get()
            ->toArray();
        $cards = $res[0]['card'];
        return collect($res[0])->forget(["name", "wallet", "email"])->put("count", $count)->forget('card')->put('cards', $cards) ->toJson();
    }

    public function addCard(Request $request){
        $cards = array();
        for($i = 0; $i < 8; $i++){
            array_push($cards, [
                    "id" => $i,
                    "name" => "Card".$i,
                    "image" => "https://via.placeholder.com/640x480.png/0044bb?text=ipsum",
                    "description" => "blah",
                    "cost" => 800
                ]
            );
        }
        $res = [
            "userid" => 3,
            "count"=> 8,
            "cards" => $cards
        ];
        return json_encode($res);
    }
}
