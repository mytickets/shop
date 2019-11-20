<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Metatext;
use Faker\Generator as Faker;

$factory->define(Metatext::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'code_name' => $faker->word,
        'code_text' => $faker->word,
        'draft' => $faker->word
    ];
});
