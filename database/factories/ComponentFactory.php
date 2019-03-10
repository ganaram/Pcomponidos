<?php

use Faker\Generator as Faker;
use App\Component;

$factory->define(App\Component::class, function (Faker $faker) {
    $name = $faker->domainWord();
    $vals = ['motherBoard','ram','cpu','gpu','powerSupply','storage'];
    return [
        'name'          => $name,
        'brand_id'      => random_int(1,5),
        'slug'          => str_slug($name, "-"),
        'info'          => $faker->text(300),
        'type'          => $vals[rand(0,5)]
    ];
});
