<?php
/*
Author: Raul Perusquia (raul@inikoo.com)
Created:  Tue Jul 28 2020 20:22:23 GMT+0800 (Malaysia Time) Tioman, Malaysia
Copyright (c) 2020, Raúl Alejandro Perusquía Flores

Version 4
*/


namespace App\Models\Suppliers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Suppliers\Agent
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property array $settings
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $legacy_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Suppliers\Supplier[] $suppliers
 * @property-read int|null $suppliers_count
 * @property-read \Spatie\Multitenancy\TenantCollection|\App\Tenant[] $tenants
 * @property-read int|null $tenants_count
 * @method static Builder|Agent newModelQuery()
 * @method static Builder|Agent newQuery()
 * @method static Builder|Agent query()
 * @method static Builder|Agent whereCreatedAt($value)
 * @method static Builder|Agent whereData($value)
 * @method static Builder|Agent whereId($value)
 * @method static Builder|Agent whereLegacyId($value)
 * @method static Builder|Agent whereName($value)
 * @method static Builder|Agent whereSettings($value)
 * @method static Builder|Agent whereSlug($value)
 * @method static Builder|Agent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Agent extends Model {
        protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
        'settings' => '{}'
    ];

    public function tenants() {
        return $this->belongsToMany('App\Tenant')->withTimestamps();
    }

    public function suppliers() {
        return $this->hasMany('App\Models\Suppliers\Supplier');
    }
}
