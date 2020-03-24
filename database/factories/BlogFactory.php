<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence(3),
        'contenido' => $faker->sentence(10),
        'fecha_creacion' => $faker->date('Y-m-d'),
        'imagen' => 'slide-'.$faker->randomDigitNotNull.'.jpg',
        'autor' => $faker->name
    ];
});
