<?php
/*
Author: Raul Perusquia (raul@inikoo.com)
Created:  Tue Jul 28 2020 20:24:02 GMT+0800 (Malaysia Time) Tioman, Malaysia 
Copyright (c) 2020, Raúl Alejandro Perusquía Flores

Version 4
*/


namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Supplier
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property string $owner_type
 * @property int $owner_id
 * @property array $settings
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $legacy_id
 * @property-read \App\Agent $agent
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $owner
 * @property-read \App\Supplier|null $supplier_owner
 * @property-read \Spatie\Multitenancy\TenantCollection|\App\Tenant[] $tenants
 * @property-read int|null $tenants_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereLegacyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereOwnerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Supplier whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Supplier extends Model
{
    protected $casts = [
        'settings' => 'array',
        'data' => 'array'

    ];


    public function tenants()
    {
        return $this->belongsToMany('App\Tenant')->withTimestamps();
    }

    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }

    public function owner()
    {
        return $this->morphTo();
    }

    public function supplier_owner()
    {
        return $this->morphOne('App\Supplier', 'owner');
    }
}
