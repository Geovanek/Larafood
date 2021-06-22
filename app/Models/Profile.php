<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * GET Permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * GET Permissions not linked with this profile
     */
    public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('permissions.id', function($query) {
            $query->select('permission_id')
                ->from('permission_profile')
                ->whereRaw("profile_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $permissions;
    }

    /**
     * GET Plans
     */
    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }
}
