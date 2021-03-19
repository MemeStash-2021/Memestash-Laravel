<?php


namespace App\Http\Services;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $model;

    public function __construct(User $model){
        $this-> model = $model;
    }

    /**
     * Retrieves all users from the database. These can be queried if a `?name=<query>` is passed along the URI.
     * @param Request $request
     * @return string
     */
    public function get_users(Request $request): string
    {
        $name = $request->input('name');
        if ($name == null) {
            return User::query() -> select(['id','name']) -> orderBy('id') -> get() -> toJson();
        }else{
            return User::query() -> select(['name', 'wallet']) -> where('name', 'LIKE', "%{$name}%") -> get() -> toJson();
        }
    }

    /**
     * Adds a new user to the database. The password's automatically hashed & Validation is taken care of (W.I.P.)
     * @param Request $request
     * @return string
     */
    public function add_user(Request $request): string
    {
        $user = new User();
        $user->name = $request->get("username");
        $user->password = Hash::make($request->get("password"));
        $user->email = $request->get("email");
        $user->save();

        return User::query()->select('id', 'name')->where('name', '=', $request->get("username"))->get()->toJson();
    }
}
