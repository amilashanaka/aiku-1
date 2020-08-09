<?php
/*
Author: Raul Perusquía (raul@inikoo.com)
Created:  Mon Jul 27 2020 17:46:42 GMT+0800 (Malaysia Time) Tioman, Malaysia
Copyright (c) 2020, AIku.io

Version 4
*/


namespace App;

use Exception;
use Artisan;
use DB;

use Illuminate\Database\Eloquent\Builder;
use Spatie\Multitenancy\Models\Tenant as Tenanto;
use Spatie\Multitenancy\TenantCollection;


/**
 * App\Tenant
 *
 * @property int $id
 * @property string $name
 * @property string $subdomain
 * @property string $database
 * @property array $settings
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Suppliers\Agent[] $agents
 * @property-read int|null $agents_count
 * @property-read \App\Models\Suppliers\Supplier|null $supplier_owner
 * @method static TenantCollection|static[] all($columns = ['*'])
 * @method static TenantCollection|static[] get($columns = ['*'])
 * @method static Builder|Tenant newModelQuery()
 * @method static Builder|Tenant newQuery()
 * @method static Builder|Tenant query()
 * @method static Builder|Tenant whereCreatedAt($value)
 * @method static Builder|Tenant whereData($value)
 * @method static Builder|Tenant whereDatabase($value)
 * @method static Builder|Tenant whereId($value)
 * @method static Builder|Tenant whereName($value)
 * @method static Builder|Tenant whereSettings($value)
 * @method static Builder|Tenant whereSubdomain($value)
 * @method static Builder|Tenant whereUpdatedAt($value)
 * @mixin \Eloquent
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
        return $this->belongsToMany('App\Models\Suppliers\Agent')->withTimestamps();
    }

    public function supplier_owner() {
        return $this->morphOne('App\Models\Suppliers\Supplier', 'owner');
    }
}
