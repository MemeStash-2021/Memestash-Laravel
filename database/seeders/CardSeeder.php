<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\CardNl;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Card::factory(50)->create();
        CardNl::factory(50)->create();
    }
}
