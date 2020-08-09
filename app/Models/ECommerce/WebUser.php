<?php
/*
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App\Models\ECommerce;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


/**
 * App\Models\ECommerce\WebUser
 *
 * @property-read \App\Models\ECommerce\Website $website
 * @method static Builder|WebUser newModelQuery()
 * @method static Builder|WebUser newQuery()
 * @method static Builder|WebUser query()
 * @mixin \Eloquent
 */
class WebUser extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function website()
    {
        return $this->belongsTo('App\Models\ECommerce\Website');
    }

}
