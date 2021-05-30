<?php

namespace Database\Factories;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

class TweetFactory extends Factory
{
  
    public function definition()
    {
        // $users = User::pluck('id')->toArray();
        return [
        'user_id'=> function () {
            return User::factory();
            },
        'body'=> $this->faker->sentence()
        
        ];
    }
}
