<?php
/*
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Part extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
