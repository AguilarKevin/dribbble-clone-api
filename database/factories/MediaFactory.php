<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\Shot;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    protected $model = Media::class;

    public function definition()
    {
        return [
            'domain' => 'https://cdn.dribbble.com',
            'path' => $this->faker->randomElement([
                '/users/1216441/screenshots/16281775/media/932a3d88c666971d3d0bb1fd2f76279a.png?compress=1&resize=1200x900',
                '/users/6816261/screenshots/16280090/media/bad4f5034f7a13949240fe072967d37a.png',
                '/users/110792/screenshots/16277458/media/2d82d90296d65077fff625e870d8f971.png?compress=1&resize=1200x900',
                '/users/2671670/screenshots/16281126/media/35ee165818cf5310906109218b6cd12f.jpg?compress=1&resize=1200x900'
            ]),
            'shot_id' => $this->faker->randomElement(Shot::pluck('id'))
        ];
    }
}
