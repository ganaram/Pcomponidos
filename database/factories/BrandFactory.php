<?php

use Faker\Generator as Faker;
use App\Brand;

$factory->define(App\Brand::class, function (Faker $faker) {
    $name = $faker->company();

    return [
        'name'      => $name,
        'slug'      => str_slug($name),
        'url'       => $faker->domainName(),
        'email'     => $faker->email(),
        'address'   => $faker->address()
    ];
});
