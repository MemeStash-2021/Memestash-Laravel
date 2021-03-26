<?php


namespace App\Http\Services;

use Illuminate\Http\Request;

class ChatService
{
    private $model;

    public function getChatsOfUser($id){
        $res = array();
        for($i = 0;$i<10;$i++){
            array_push($res, [
                "correspondent" => [
                    "id" => $i,
                    "name" => ($i % 2 === 0) ? "Ruiner" : "Mori"
                ],
                "latestMessage" => [
                    "message" => "This is an example message",
                    "date" => "2021-03-2".(5-$i)."T08:34:27.807Z",
                    "sender" => ($i % 2 === 0) ? "Mori" : "Ruiner",
                    "senderId" => ($i % 2 === 0) ? 1 : $id
                ]
            ]);
        }
        return json_encode($res);
    }

    public function showMessages(int $ouid, int $tuid){
        $res = array();
        for($i = 0; $i<9; $i++){
            array_push($res, [
                "message" => "This is an example message",
                "date" => "2021-03-2".(9-$i)."T08:34:27.807Z",
                "sender" => ($i % 2 === 0) ? "Mori" : "Ruiner",
                "senderId" => ($i % 2 === 0) ? $ouid : $tuid
            ]);
        }
        return json_encode($res);
    }

    public function addMessage(Request $request, int $ouid, int $tuid){
        $messages = array();
        array_push($messages, [
            "message" => $request->get("message"),
            "date" => "2021-03-30T08:34:27.807Z",
            "sender" => "Mori",
            "senderId" => $ouid
        ]);
        for($i = 0; $i<9; $i++){
            array_push($messages, [
                "message" => "This is an example message",
                "date" => "2021-03-2".(9-$i)."T08:34:27.807Z",
                "sender" => ($i % 2 === 0) ? "Mori" : "Ruiner",
                "senderId" => ($i % 2 === 0) ? $ouid : $tuid
            ]);
        }
        return json_encode([
            "user" => [
                "id" => $ouid,
                "name" => "Ruiner"
            ],
            "correspondent" => [
                "id" => $tuid,
                "name" => "Ruiner"
            ],
            "messages" => $messages
        ]);
    }

    public function beginConversation(Request $request, int $ouid, int $tuid){
        return json_encode([
            "user" => [
                "id" => $ouid,
                "name" => "Ruiner"
            ],
            "correspondent" => [
                "id" => $tuid,
                "name" => "Ruiner"
            ],
            "messages" => [
                "message" => $request -> get("message"),
                "date" => "2021-03-25T08:34:27.807Z",
                "sender" => "Ruiner",
                "senderId" => $ouid
            ]
        ]);
    }
}
