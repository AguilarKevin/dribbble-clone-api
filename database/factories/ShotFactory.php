<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Shot;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shot::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->paragraph(1),
            'views'  => $this->faker->numberBetween(50, 7000),
            'user_id' => $this->faker->randomElement(User::pluck('id'))
        ];
    }
}

