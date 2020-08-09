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
 * App\Models\ECommerce\Website
 *
 * @property-read \App\Models\Stores\Store $store
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ECommerce\WebUser[] $web_users
 * @property-read int|null $web_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ECommerce\Webpage[] $webpages
 * @property-read int|null $webpages_count
 * @method static Builder|Website newModelQuery()
 * @method static Builder|Website newQuery()
 * @method static Builder|Website query()
 * @mixin \Eloquent
 */
class Website extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function store() {
        return $this->belongsTo('App\Models\Stores\Store');
    }

    public function webpages() {
        return $this->hasMany('App\Models\ECommerce\Webpage');
    }


    public function web_users() {
        return $this->hasMany('App\Models\ECommerce\WebUser');
    }


}
