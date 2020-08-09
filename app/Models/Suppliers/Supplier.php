<?php
/*
Author: Raul Perusquia (raul@inikoo.com)
Created:  Tue Jul 28 2020 20:24:02 GMT+0800 (Malaysia Time) Tioman, Malaysia
Copyright (c) 2020, Raúl Alejandro Perusquía Flores

Version 4
*/


namespace App\Models\Suppliers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Suppliers\Supplier
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
 * @property-read \App\Models\Suppliers\Agent $agent
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $owner
 * @property-read \App\Models\Suppliers\Supplier|null $supplier_owner
 * @property-read \Spatie\Multitenancy\TenantCollection|\App\Tenant[] $tenants
 * @property-read int|null $tenants_count
 * @method static Builder|Supplier newModelQuery()
 * @method static Builder|Supplier newQuery()
 * @method static Builder|Supplier query()
 * @method static Builder|Supplier whereCreatedAt($value)
 * @method static Builder|Supplier whereData($value)
 * @method static Builder|Supplier whereId($value)
 * @method static Builder|Supplier whereLegacyId($value)
 * @method static Builder|Supplier whereName($value)
 * @method static Builder|Supplier whereOwnerId($value)
 * @method static Builder|Supplier whereOwnerType($value)
 * @method static Builder|Supplier whereSettings($value)
 * @method static Builder|Supplier whereSlug($value)
 * @method static Builder|Supplier whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Supplier extends Model {
    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'

    ];


    public function tenants() {
        return $this->belongsToMany('App\Tenant')->withTimestamps();
    }

    public function agent() {
        return $this->belongsTo('App\Models\Suppliers\Agent');
    }

    public function owner() {
        return $this->morphTo();
    }

    public function supplier_owner() {
        return $this->morphOne('App\Models\Suppliers\Supplier', 'owner');
    }
}
