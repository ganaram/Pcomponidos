<?php

use App\Computer;
use Faker\Generator as Faker;

$factory->define(Computer::class, function (Faker $faker) {
    $name = $faker->firstName();
    return [
        'user_id' => random_int(1,2),
        'model' => $name,
        'slug' => str_slug($name,"-"),
        'model' => $faker->userName(),
        'description'  => $faker->text(500),
        'price' => random_int(100,1500)
    ];
});
