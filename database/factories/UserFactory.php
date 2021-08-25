<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('1234'),
            'tag' => $this->faker->randomElement(['pro', 'team']),
            'avatar' => $this->faker->randomElement([
                'https://cdn.dribbble.com/users/6395846/avatars/mini/f8c70deab558ca91b520afb34601979a.png?1605804828',
                'https://cdn.dribbble.com/users/1667332/avatars/mini/edd45777913e5de4434a1a1b812c76cf.png?1566878129',
                'https://cdn.dribbble.com/users/5000931/avatars/mini/4926b403e2734e9da41c86a9b570a953.png?1612021633',
                'https://cdn.dribbble.com/users/1011558/avatars/mini/78c80638669d509a947c9e70a926ac25.jpg?1562672930',
                'https://cdn.dribbble.com/users/1192832/avatars/small/86cebb499d7812794092dbb96ca5a77b.png?1515681607',
                'https://cdn.dribbble.com/users/81958/avatars/small/9eb00ddb87459f901a95477b17dc9d96.jpg?1612980284',
                'https://cdn.dribbble.com/users/6225232/avatars/small/d09fe559f7904972d4f79a3d0b50f1a3.jpg?1604502333',
            ]),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
