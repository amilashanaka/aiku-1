<?php
/*
Author: Raul Perusquía (raul@inikoo.com)
Created:  Mon Jul 27 2020 17:46:42 GMT+0800 (Malaysia Time) Tioman, Malaysia
Copyright (c) 2020, AIku.io

Version 4
*/


namespace App;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Spatie\Multitenancy\Models\Tenant as Tenanto;

/**
 * Class Tenant
 *
 * @property string database
 * @property integer  id
 * @package App
 *
 */
class Tenant extends Tenanto {
    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];


    public static function booted() {
        static::created(fn(Tenant $model) => $model->post_creation_actions());
    }

    /**
     * @throws \Exception
     */
    public function post_creation_actions() {

        if (ctype_alpha($this->database) or ctype_lower($this->database)) {

            throw new Exception('Invalid database name');

        }


        DB::connection('scaffolding')->statement("DROP DATABASE IF EXISTS " . $this->database);

        DB::connection('scaffolding')->statement("CREATE DATABASE IF NOT EXISTS " . $this->database);
        Artisan::call('tenants:artisan "migrate --database=tenant" --tenant='.$this->id );

    }

    public function agents() {
        return $this->belongsToMany('App\Agent')->withTimestamps();;
    }

    public function supplier_owner() {
        return $this->morphOne('App\Supplier', 'owner');
    }
}
