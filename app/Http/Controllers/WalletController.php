<?php

namespace App\Http\Controllers;

use App\Http\Services\WalletService;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    private $service;

    public function __construct(WalletService $service)
    {
        $this->service = $service;
    }

    public function add(Request $request, int $id){
        return $this->service->addCurrency($id, $request);
    }
}
