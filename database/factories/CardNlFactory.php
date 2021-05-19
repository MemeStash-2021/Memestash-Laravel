<?php

namespace Database\Factories;

use App\Models\CardNl;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardNlFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CardNl::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public static $card_id = 0;
    public function definition()
    {
        $faker_nl = \Faker\Factory::create("nl_BE");
        CardNlFactory::$card_id++;
        return [
            'name' => ($faker_nl->userName)." (NL)",
            'card_id'=> CardNlFactory::$card_id,
            'description' => ($faker_nl->realText(255))." (NL)"
        ];
    }
}
