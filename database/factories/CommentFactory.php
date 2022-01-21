<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Factory::factoryForModel(Comment::class)->define(function (Faker $faker) {
            return [
                'user_name' => $faker->name,
                'text' => $faker->text,
                'post_id' => $faker->numberBetween(1, 100)
            ];
        });

        return null;
    }
}
