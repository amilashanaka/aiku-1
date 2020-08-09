<?php
/*
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App\Models\Stores;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


/**
 * App\Models\Stores\StoreAggregation
 *
 * @property-read \App\Models\Stores\Store $store
 * @method static Builder|StoreAggregation newModelQuery()
 * @method static Builder|StoreAggregation newQuery()
 * @method static Builder|StoreAggregation query()
 * @mixin \Eloquent
 */
class StoreAggregation extends Model {
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
