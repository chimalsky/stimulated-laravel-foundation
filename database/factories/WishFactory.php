<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use App\Wish;
use Faker\Generator as Faker;

$factory->define(Wish::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'user_id' => User::inRandomOrder()->first()
    ];
});
