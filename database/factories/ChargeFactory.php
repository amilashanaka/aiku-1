<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sales\Charge;
use Faker\Generator as Faker;

$factory->define(Charge::class, function (Faker $faker,$args) {
    $name = $faker->word;

    return [
        'tenant_id' => $args['tenant_id'],

        'slug'      => Str::slug($name),

    ];
});
