<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Media;
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

        $tags = ['black', 'mobile app', 'ui', 'dark theme', 'light theme', 'web ui', 'prototype', 'white', 'yellow', 'blue'];
        foreach ($tags as $tagname){
            $tag = new Tag(['name' =>  $tagname, 'slug' => Str::slug($tagname, '-')]);
            $tag->save();
        }


        $media = [
            '/users/970957/screenshots/15038039/media/33990dec000002b51b25fe3ac76829a3.mp4',
            '/users/3041390/screenshots/15743410/media/de0d10fc5d63137477ecb0d6b8866816.png?compress=1&resize=1200x900',
            '/users/4199519/screenshots/16311471/media/bdfc0463f7edbc38c4d97f5f03819c74.png?compress=1&resize=600x450',
            '/users/1575908/screenshots/16305789/media/5252a086c4e530de30dffb4322027503.jpg?compress=1&resize=600x450',
            '/users/1668874/screenshots/16293570/media/4057fd617551fe1a1def570ee2402cef.mp4',
            '/users/31078/screenshots/16308227/media/da179e4289982b5801e9593bc3bc87d8.jpg?compress=1&resize=600x450',
            '/users/2685252/screenshots/16301344/media/72132c678e1606131249df50187ee108.png?compress=1&resize=600x450',
            '/users/970957/screenshots/15038039/media/33990dec000002b51b25fe3ac76829a3.mp4',
            '/users/4975934/screenshots/16309260/media/4f81ddced612fbc8916daa0aa7b3cb11.jpg?compress=1&resize=600x450',
            '/users/4505805/screenshots/16295534/media/65dc0a86843317cc704dedbff12ceacb.png?compress=1&resize=600x450',
            '/users/585028/screenshots/16290352/media/a6e6061e8536a91a257405ff60d0ebb1.jpg?compress=1&resize=600x450',
            '/users/194964/screenshots/16295174/media/f2f8048d7b611064f50113609d642370.mp4',
            '/users/4208985/screenshots/16309380/media/5a24affd49735dd2ba3418a0f6f9c1ac.png?compress=1&resize=600x450',
            '/users/4208985/screenshots/16316483/media/7ff4e65ce2b33248c5085db5680f9a45.mp4',
            '/users/6816261/screenshots/16317924/media/9b539bbc64842f2ba02588b5f916f36f.mp4',
            '/users/4859/screenshots/15853681/media/2e7b1bce82484a2d28e4514999990cdf.mp4',
        ];

        Shot::factory(60)->create();
        $shots = Shot::query()->get();
        $shots->each(function ($shot, $key) use($media){
            for ($i = 0; $i < 5; $i++){
                $shot->tags()->attach(Arr::random([1,2,3,4,5,6,7,8,9,10]));
                $path = Arr::random($media);
                $mimetype = Str::contains($path, ['.jpg', '.png']) ? 'image': 'video';

                $shot->media()->create(['domain'=>'https://cdn.dribbble.com', 'path' => $path, 'mimetype'=> $mimetype]);
            }
        });
    }
}
