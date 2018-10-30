<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->define(\App\Models\Product::class, function(Faker $faker) {

    return [
        'name' => $faker->unique()->name,
        'price' => 12000,
        'user_id' => \App\Models\User::first()->id
    ];
});


$factory->define(\App\Models\Category::class, function(Faker $faker) {

    return [
        'title' => $faker->unique()->name,
        'user_id' => \App\Models\User::first()->id
    ];
});
