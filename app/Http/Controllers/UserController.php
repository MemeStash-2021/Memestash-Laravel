<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        if ($name == null) {
            return User::query() -> select(['id','name']) -> orderBy('id') -> get() -> toJson();
        }else{
            return User::query() -> select(['name', 'wallet']) -> where('name', 'LIKE', "%{$name}%") -> get() -> toJson();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get("username");
        $password = $request->get("password");
        return json_encode(array('id'=>12, "name" => $name));
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
