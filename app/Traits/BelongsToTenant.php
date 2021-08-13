<?php


namespace App\Traits;


use App\Scopes\TenantScope;
use App\Tenant;

trait BelongsToTenant
{
    protected static function bootBelongsToTenant()
    {
        static::addGlobalScope(new TenantScope);

        static::creating(function ($model) {
            $model->tenant_id = session()->get('tenant_id');
        });
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
