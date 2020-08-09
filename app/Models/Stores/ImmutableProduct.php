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
 * App\ImmutableProduct
 *
 * @method static Builder|ImmutableProduct newModelQuery()
 * @method static Builder|ImmutableProduct newQuery()
 * @method static Builder|ImmutableProduct query()
 * @mixin \Eloquent
 */
class ImmutableProduct extends Model {
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
