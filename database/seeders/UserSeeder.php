<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Defining al least one constant profile*/
        $user = new User();
        $user->name = "Mori";
        $user->email = "mori@EN.com";
        $user->password = Hash::make("y0urM0ri");
        $user->save();
        /*randomly generating remaining accounts*/
        User::factory(10)->create();
    }
}
