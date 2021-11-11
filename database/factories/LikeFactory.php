<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\Shot;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    protected $model = Like::class;

    public function definition()
    {
        return [
            'shot_id' => $this->faker->randomElement(Shot::plunck('id')),
            'user_id' => $this->faker->randomElement(User::plunck('id')),
        ];
    }
}
