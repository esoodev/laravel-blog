<?php

use Faker\Generator as Faker;

$factory->define(App\Magazine::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(30, 1),
        'content_lead' => $faker->realText(200, 1),
        'content_body' => $faker->realText(400, 3),      
        'is_visible' => true,
        'created_at' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null)
    ];
});