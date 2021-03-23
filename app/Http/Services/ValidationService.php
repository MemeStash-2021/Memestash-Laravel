<?php


namespace App\Http\Services;

use Illuminate\Http\Request;

class ValidationService
{
    public function newUser(Request $request): array
    {
        $rules = [
            "username" => "String|max:255|unique:App\Models\User,name|required",
            "email" => "email|max:255|unique:App\Models\User,email|required",
            "password" => "string|max:128|required"
        ];
        return $request -> validate($rules);
    }
}
