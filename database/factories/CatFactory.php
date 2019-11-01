<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cat;
use Faker\Generator as Faker;

$factory->define(Cat::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'ident' => $faker->word,
        'name' => $faker->word,
        'desc' => $faker->word,
        'image' => $faker->word,
        'menu' => $faker->word,
        'xml_name' => $faker->word,
        'parent_id' => $faker->word
    ];
});
