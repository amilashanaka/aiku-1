<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CRM\Customer;
use Faker\Generator as Faker;

$factory->define(
    Customer::class, function (Faker $faker,$args) {
    $name = $faker->word;

    return [
        'tenant_id' => $args['tenant_id'],
        'slug'      => Str::slug($name),

    ];
});
