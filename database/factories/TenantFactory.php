<?php
/*
Author: Raul A Perusquía-Flores (raul@inikoo.com)
Created:  Mon Aug 03 2020 09:46:51 GMT+0800 (Malaysia Time) Kuala Lumpur, Malaysia
Copyright (c) 2020,  AIku.io

Version 4
*/


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tenant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Tenant::class, function (Faker $faker) {

    $faker->seed(1234);

    $name=$faker->unique()->domainWord;
    $subdomain=Str::limit($name,3,'');

    return [
        'name' => ucfirst($name),
        'subdomain' => $subdomain,
        'database' => 'au_'.$subdomain,
        'settings' => [
            'recover_email' => $faker->safeEmail,
            'recover_pin'   => hash('crc32', rand(0, 10000))
        ]
    ];
});
