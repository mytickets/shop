<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cat;
use Faker\Generator as Faker;

$factory->define(Cat::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'name' => $faker->word,
        'desc' => $faker->word,
        'image' => $faker->word,
        'xml_name' => $faker->word,
        'menu' => $faker->word,
        'parent_id' => $faker->word,
        'ident' => $faker->word
    ];
});
