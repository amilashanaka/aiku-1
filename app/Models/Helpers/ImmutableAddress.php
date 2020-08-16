<?php
/*
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App\Models\Helpers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


/**
 * App\Models\Helpers\ImmutableAddress
 *
 * @method static Builder|ImmutableAddress newModelQuery()
 * @method static Builder|ImmutableAddress newQuery()
 * @method static Builder|ImmutableAddress query()
 * @mixin \Eloquent
 */
class ImmutableAddress extends Model {
    use UsesTenantConnection;

        protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
        'settings' => '{}'
    ];


}
