<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
