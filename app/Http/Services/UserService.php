<?php


namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService
{
    private $model;
    private $validator;

    public function __construct(User $user, ValidationService $validator)
    {
        $this->model = $user;
        $this->validator = $validator;
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
            return User::select(['id', 'name'])->orderBy('id', 'asc')->get();
        } else {
            return User::where('name', 'like', "%".$name."%")->select(['id', 'name'])->get();
        }
    }

    /**
     * Adds a new user to the database. The password's automatically hashed & Validation is taken care of (W.I.P.)
     * @param Request $request
     * @return string
     * @throws ValidationException
     */
    public function add_user(Request $request): string
    {
        $validation = $this->validator->newUser($request);
        if($validation -> fails()){
            throw new ValidationException($validation);
        }
        $user = new User();
        $user->name = $request->get('username');
        $user->password = Hash::make($request->get('password'));
        $user->email = $request->get('email');
        $user->save();
        return User::select(['id', 'name'])->orderBy('id', 'desc')->first();
    }

    /**
     * Shows a specific student and his information. The password's automatically hashed & Validation is taken care of (W.I.P.)
     * @param int $id
     * @return string
     */

    public function show_user(int $id): string
    {
        $user = User::with(['card'])->findOrFail($id);
        $card = collect($user)->pull('card');
        return collect($user)->forget('card')->put('cards', $card)->toJson();
    }
}
