<?php


namespace App\Http\Services;


use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    /**
     * Retrieves all users from the database. These can be queried if a `?name=<query>` is passed along the URI.
     * @param Request $request
     * @return string
     */
    public static function get_users(Request $request): string
    {
        $name = $request->input('name');
        if ($name == null) {
            return User::query() -> select(['id','name']) -> orderBy('id') -> get() -> toJson();
        }else{
            return User::query() -> select(['name', 'wallet']) -> where('name', 'LIKE', "%{$name}%") -> get() -> toJson();
        }
    }
}
