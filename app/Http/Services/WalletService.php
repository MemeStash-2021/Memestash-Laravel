<?php


namespace App\Http\Services;


use Illuminate\Http\Request;

class WalletService
{
    private $model;

    public function addCurrency(int $id, Request $request){
        $cards = array();
        for ($i = 0; $i < 5; $i++){
            array_push($cards, [
                "id" => $i,
                "name" => "Card ".$i,
                "image" => "https://via.placeholder.com/300",
                "description" => "This is a card with a description",
                "cost" => 800
            ]);
        }
        return json_encode([
            "id" => $id,
            "name" => "Rider",
            "wallet" => 800000 + $request->get("amount"),
            "cards" => $cards
        ]);
    }
}
