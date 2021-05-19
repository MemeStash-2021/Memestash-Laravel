<?php

namespace App\Http\Controllers;

use App\Http\Services\CardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        $this->changeLocale($request);
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

    private function changeLocale(Request $request){
        $locale = App::getLocale();
        if($request->input('lang') != $locale){
            App::setLocale($request->input('lang'));
        }
    }
}
