<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function () {
    Route::get('/',[UserController::class, 'index']);
    Route::get('/{ouid}', [UserController::class, 'show']);
    Route::put('/', [UserController::class, 'store']);
    Route::patch('/{ouid}', [UserController::class, 'update']);
    Route::get('/{ouid}/cards', [CardController::class, 'show']);
    Route::put('/{ouid}/chats/{cid}', [CardController::class, 'store']);
});

Route::prefix('cards') -> group(function (){
    Route::get('/', [CardController::class, 'index']);
});
