<?php

namespace Database\Factories;

use App\Models\Shot;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class ShotFactory extends Factory
{
    protected $model = Shot::class;

    #[ArrayShape(['title' => "string", 'description' => "string", 'views' => "int", 'saves' => "int", 'user_id' => "mixed"])] public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->paragraph(6),
            'views'  => $this->faker->numberBetween(50, 7000),
            'saves'  => $this->faker->numberBetween(50, 70),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
        ];
    }
}
