<?php

namespace App\Http\Controllers;

use App\Http\Services\ChatService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatController extends Controller
{
    private $service;

    public function __construct(ChatService $service)
    {
        $this -> service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $id
     * @return Response
     */
    public function index(int $id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param int $ouid
     * @param int $tuid
     * @return Response
     */
    public function store(Request $request, int $ouid, int $tuid)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $ouid
     * @param int $tuid
     * @return Response
     */
    public function show(int $ouid, int $tuid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $ouid
     * @param int $tuid
     * @return Response
     */
    public function update(Request $request, int $ouid, int $tuid)
    {
        //
    }
}
