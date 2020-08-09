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
 * App\Models\ECommerce\Webpage
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ECommerce\WebBlock[] $web_blocks
 * @property-read int|null $web_blocks_count
 * @property-read \App\Models\ECommerce\Website $website
 * @method static Builder|Webpage newModelQuery()
 * @method static Builder|Webpage newQuery()
 * @method static Builder|Webpage query()
 * @mixin \Eloquent
 */
class Webpage extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function website()
    {
        return $this->belongsTo('App\Models\ECommerce\Website');
    }


    public function web_blocks()
    {
        return $this->hasMany('App\Models\ECommerce\WebBlock');
    }


}
