<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = array();
        for ($i = 0; $i < 10; $i++) {
            $res[$i] = array('id' => $i, 'username' => "user" . strval($i));
        }
        $name = $request->input('name');
        if(is_null($name)){
            return json_encode($res);
        } else{
            for( $i = 0; $i< count($res); $i++){
                $user = $res[$i];
                if(!str_contains(($user['username']), $name)){
                    unset($res[$i]);
                }
            }
            $newres = array();
            foreach ($res as $key => $value){
                array_push($newres, $value);
            }
            return ($newres);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request): string
    {
        $user = new User();
        $user -> name = $request->get("username");
        $user -> password = Hash::make($request->get("password"));
        $user -> email = $request->get("email");
        $user -> save();

        return User::query() -> select('id','name') -> where('name', '=', $request->get("username")) -> get() -> toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = array('id' => $id, 'name' => "Ruiner", "wallet" => 800000);
        $cards = array();
        for ($i =0; $i<6; $i++){
            $cards[$i] = array('id'=> $i, "name" => "card1", "image" => "https://placeholder.com/300", "description" => "A description", "cost" => 800);
        }
        array_push($res, ["cards" => $cards]);
        return json_encode($res);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return json_encode(array('id' => $id, 'name' => $request->get('username')));
    }
}
