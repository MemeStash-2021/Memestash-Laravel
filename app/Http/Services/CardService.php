<?php


namespace App\Http\Services;


use App\Models\Card;
use Illuminate\Http\Request;

class CardService
{
    private $model;

    function __construct(Card $card)
    {
        $this -> model = $card;
    }

    public function getCards()
    {
        //TODO: When implementing actual call, make sure that it also can be filtered on id & name
        $res = array();
        for($i = 0; $i < 8; $i++){
            array_push($res, [
                "id" => $i,
                    "name" => "Card".$i,
                    "image" => "https://via.placeholder.com/640x480.png/0044bb?text=ipsum",
                    "description" => "blah",
                    "cost" => 800
                ]
            );
        }
        return json_encode($res);
    }

    public function getUserCards($id){
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
            "userid" => $id,
            "count"=> 8,
            "cards" => $cards
        ];
        return json_encode($res);
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
