<?php

namespace App\Http\Controllers;

use App\Http\Services\CardService;
use Illuminate\Http\Request;

class CardController extends Controller
{
    private $service;

    public function __construct(CardService $service){
        $this -> service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return string
     */
    public function index(Request $request): string
    {
        return $this->service->getCards($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        return $this->service->addCard($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return string
     */
    public function show($id)
    {
        return $this->service->getUserCards($id);
    }
}
