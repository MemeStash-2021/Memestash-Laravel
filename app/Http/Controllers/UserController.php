<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService as Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return string
     */
    public function index(Request $request): string
    {
       return Service::get_users($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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
     * @return Response
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
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return json_encode(array('id' => $id, 'name' => $request->get('username')));
    }
}
