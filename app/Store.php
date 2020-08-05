<?php
/*
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Store extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function prospects()
    {
        return $this->hasMany('App\Prospect');
    }
}
