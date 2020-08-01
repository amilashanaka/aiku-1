<?php
/*
Author: Raul Perusquía (raul@inikoo.com)
Created:  Mon Jul 27 2020 16:24:18 GMT+0800 (Malaysia Time) Kuala Lumpur, Malaysia
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable,UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

}
