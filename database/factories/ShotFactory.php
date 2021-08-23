<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->paragraph(2),
//            'image' => $this->faker->randomElement([
//                'https://cdn.dribbble.com/users/1216441/screenshots/16281775/media/932a3d88c666971d3d0bb1fd2f76279a.png?compress=1&resize=1200x900',
//                'https://cdn.dribbble.com/users/6816261/screenshots/16280090/media/bad4f5034f7a13949240fe072967d37a.png',
//                'https://cdn.dribbble.com/users/110792/screenshots/16277458/media/2d82d90296d65077fff625e870d8f971.png?compress=1&resize=1200x900',
//                'https://cdn.dribbble.com/users/2671670/screenshots/16281126/media/35ee165818cf5310906109218b6cd12f.jpg?compress=1&resize=1200x900'
//            ]),
            'views'  => $this->faker->numberBetween(50, 7000),
            'user_id' => $this->faker->randomElement(User::pluck('id'))
        ];
    }
}

