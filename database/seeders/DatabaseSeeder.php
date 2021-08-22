<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(2)->create();

        $emails = ['kevin@gmail.com', 'alex@gmail.com'];
         $users = User::query()->get();
         $users->each(function ($user, $key) use($emails){
             Log::info("token".$key." ".$user->createToken('auth_token')->plainTextToken);;
             $user->email = $emails[$key];
             $user->save();
         });

        Post::factory(30)->create();
    }
}
