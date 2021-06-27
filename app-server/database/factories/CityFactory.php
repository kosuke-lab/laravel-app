<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\City;
use App\Models\Like;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'area' => $faker->name,
        'file_path' => $faker->mimeType,
    ];
});
