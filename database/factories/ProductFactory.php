<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Stores\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker,$args) {
    $name = $faker->word;

    return [
        'tenant_id' => $args['tenant_id'],

        'slug'      => Str::slug($name),

    ];
});
