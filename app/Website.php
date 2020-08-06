<?php
/*
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Website extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function webpages()
    {
        return $this->hasMany('App\Webpage');
    }


    public function web_users()
    {
        return $this->hasMany('App\WebUser');
    }


}
