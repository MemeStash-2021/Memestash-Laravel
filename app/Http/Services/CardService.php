<?php


namespace App\Http\Services;


use App\Models\Card;
use App\Models\CardNl;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        $res = Card::all();
        if(App::getLocale() == "nl_BE"){
            $res = $this->getTranslations();
        }
        if($id !== null){
            return collect($res)->where('id', $id)->toJson();
        } else if($name !== null){
            return collect($res)->filter(function ($value, $key) use ($name){
                return str_contains(strtolower(collect($value)->get('name')), strtolower($name));
            })->toJson();
        }
        return collect($res) -> toJson();
    }

    public function getUserCards($id): string
    {
        $res = User::with('card')->findOrFail($id);
        $cards = collect($res)->get('card');
        $count = count($cards);
        return collect($res)
            ->forget(["name", "wallet", "email"])
            ->put("count", $count)
            ->forget('card')
            ->put('cards', $cards);
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

    private function getTranslations(): array
    {
        $res = [];
        $cards = CardNl::with(['card']) -> get();
        foreach ($cards as $card){
            $info = collect($card)->pull('card');
            array_push($res, collect($info)->merge($card)->forget(['card_id', 'card']));
        }
        return $res;
    }
}
