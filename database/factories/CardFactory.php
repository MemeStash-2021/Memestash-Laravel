<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->catchPhrase,
            'picture' => $this->faker->imageUrl(),
            'price' => $this->faker->numberBetween(100, 1200),
            'description'=> $this->faker->realText(255),
            'likes' => $this->faker->numberBetween(0, 1000000),
            'views' => $this->faker->numberBetween(0, 1000000)
        ];
    }
}
