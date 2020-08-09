<?php
/*
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


/**
 * App\Models\Sales\Charge
 *
 * @property-read \App\Models\Stores\Store $store
 * @method static Builder|Charge newModelQuery()
 * @method static Builder|Charge newQuery()
 * @method static Builder|Charge query()
 * @mixin \Eloquent
 */
class Charge extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Stores\Store');
    }
}
