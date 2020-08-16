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
 * App\Models\ECommerce\WebBlock
 *
 * @property-read \App\Models\ECommerce\Webpage $webpage
 * @method static Builder|WebBlock newModelQuery()
 * @method static Builder|WebBlock newQuery()
 * @method static Builder|WebBlock query()
 * @mixin \Eloquent
 */
class WebBlock extends Model {
    use UsesTenantConnection;

        protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
        'settings' => '{}'
    ];

    public function webpage()
    {
        return $this->belongsTo('App\Models\ECommerce\Webpage');
    }


}
