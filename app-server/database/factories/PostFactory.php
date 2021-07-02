<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'city_id' => $faker->randomElement($array=['1','2']),
        'category_id' => $faker->randomElement($array=['1','2']),
        'status_id' => $faker->randomElement($array=['1','2']),
        'titile' => $faker->text(50),
        'address' => $faker->address(),
        'user_id' => $faker->randomElement($array=['1','2']),
    ];
});

