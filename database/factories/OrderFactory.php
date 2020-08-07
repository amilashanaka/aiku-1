<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker,$args) {
    $name = $faker->word;
   
    return [
        'tenant_id' => $args['tenant_id'],
     
        'slug'      => Str::slug($name),

    ];
});
