<?php

namespace Database\Factories;

use App\Models\CardNl;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

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
    public static $faker_nl;
    public static $card_id = 0;
    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        CardNlFactory::$faker_nl = \Faker\Factory::create("nl_BE");
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
    }

    public function definition()
    {
        CardNlFactory::$card_id++;
        return [
            'name' => (CardNlFactory::$faker_nl->userName)." (NL)",
            'card_id'=> CardNlFactory::$card_id,
            'description' => (CardNlFactory::$faker_nl->realText(255))." (NL)"
        ];
    }
}
