<?php
/*
Author: Raul Perusquía (raul@inikoo.com)
Created:  Mon Jul 27 2020 17:46:42 GMT+0800 (Malaysia Time) Tioman, Malaysia
Copyright (c) 2020, AIku.io

Version 4
*/


namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Tenant as Tenanto;

class Tenant extends Tenanto
{
    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function agents()
    {
        return $this->belongsToMany('App\Agent')->withTimestamps();;
    }

    public function supplier_owner()
    {
        return $this->morphOne('App\Supplier', 'owner');
    }
}
