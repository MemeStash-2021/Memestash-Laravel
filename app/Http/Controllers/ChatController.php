<?php

namespace App\Http\Controllers;

use App\Http\Services\ChatService;
use Illuminate\Http\Request;

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
     * @return string
     */
    public function index(int $id): string
    {
        return $this->service->getChatsOfUser($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param int $ouid
     * @param int $tuid
     * @return string
     */
    public function store(Request $request, int $ouid, int $tuid): string
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $ouid
     * @param int $tuid
     * @return string
     */
    public function show(int $ouid, int $tuid): string
    {
        return $this->service->showMessages($ouid, $tuid);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $ouid
     * @param int $tuid
     * @return string
     */
    public function update(Request $request, int $ouid, int $tuid): string
    {
        return $this->service->addMessage($request, $ouid, $tuid);
    }
}
