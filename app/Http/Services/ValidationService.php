<?php


namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationService
{
    public function newUser(Request $request): \Illuminate\Contracts\Validation\Validator
    {
        $rules = [
            "username" => "required|String|max:255|unique:App\Models\User,name",
            "email" => "required|email|max:255|unique:App\Models\User,email",
            "password" => "required|string|max:128"
        ];
        return Validator::make($request -> all(),$rules);
    }
}
