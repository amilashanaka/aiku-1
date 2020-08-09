<?php
/*
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App\Models\Distribution;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

/**
 * App\Models\Distribution\Part
 *
 * @property-read \App\Models\Stores\Product $product
 * @method static Builder|Part newModelQuery()
 * @method static Builder|Part newQuery()
 * @method static Builder|Part query()
 * @mixin \Eloquent
 */
class Part extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function product() {
        return $this->belongsTo('App\Models\Stores\Product');
    }
}
