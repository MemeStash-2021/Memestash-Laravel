<?php


namespace App\Http\Services;


use App\Models\Card;
use Illuminate\Support\Facades\Request;

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

    public function getUserCards(){
        //
    }

    public function addCard(Request $request){
        //
    }
}
