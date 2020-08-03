<?php
/*
Author: Raul Perusquia (raul@inikoo.com)
Created:  Tue Jul 28 2020 20:22:23 GMT+0800 (Malaysia Time) Tioman, Malaysia 
Copyright (c) 2020, Raúl Alejandro Perusquía Flores

Version 4
*/


namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Agent
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property array $settings
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $legacy_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Supplier[] $suppliers
 * @property-read int|null $suppliers_count
 * @property-read \Spatie\Multitenancy\TenantCollection|\App\Tenant[] $tenants
 * @property-read int|null $tenants_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereLegacyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Agent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Agent extends Model
{
    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function tenants()
    {
        return $this->belongsToMany('App\Tenant')->withTimestamps();
    }

    public function suppliers()
    {
        return $this->hasMany('App\Supplier');
    }
}
