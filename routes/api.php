<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
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

/*User endpoints*/
Route::prefix('users')->group(function () {
    Route::get('/',[UserController::class, 'index']);
    Route::put('/', [UserController::class, 'store']);
});

Route::prefix('users/{ouid}')->group(function () {
    Route::get('/', [UserController::class, 'show']);
    Route::patch('/', [UserController::class, 'update']);
    Route::put('/wallet', [WalletController::class, 'add']);
    Route::get('/chats', [ChatController::class, 'index']);
});

/*Cards endpoints*/
Route::prefix('cards') -> group(function (){
    Route::get('/', [CardController::class, 'index']);
});

Route::prefix('users/{ouid}/cards')->group(function (){
    Route::get('/', [CardController::class, 'show']);
    Route::put('/{cid}', [CardController::class, 'store']);
});

/*Chat endpoints*/
Route::prefix('users/{ouid}/chats/{tuid}')->group(function (){
    Route::get('/', [ChatController::class, 'show']);
    Route::patch('/', [ChatController::class, 'update']);
    Route::put('/', [ChatController::class, 'store']);
});

Route::fallback(function(){
    return response()->json([
        'message' => 'Route not found'], 404);
});
