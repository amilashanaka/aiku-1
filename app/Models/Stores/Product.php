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
 * App\Models\Stores\Product
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Distribution\Part[] $parts
 * @property-read int|null $parts_count
 * @property-read \App\Models\Stores\Store $store
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @mixin \Eloquent
 */
class Product extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Stores\Store');
    }

    public function parts()
    {
        return $this->hasMany('App\Models\Distribution\Part');
    }
}
