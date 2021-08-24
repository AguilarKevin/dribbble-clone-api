<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Post;
use App\Models\Shot;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(4)->create();

         $users = User::query()->get();
         $users->each(function ($user, $key) {
             Log::info("token".$key." ".$user->createToken('auth_token')->plainTextToken);
             $user->save();
         });

        Shot::factory(50)->create();
        Media::factory(70)->create();

        $tags = ['black', 'mobile app', 'ui', 'dark theme', 'light theme', 'web ui', 'prototype', 'white', 'yellow', 'blue'];


        foreach ($tags as $tagname){
            $tag = new Tag(['name' =>  $tagname, 'slug' => Str::slug($tagname, '-')]);
            $tag->save();
        }

        $shots = Shot::query()->get();
        $shots->each(function ($shot, $key){
            for ($i = 0; $i < 4; $i++){
                $shot->tags()->attach(Arr::random([1,2,3,4,5,6,7,8,9,10]));
            }
        });
    }
}
