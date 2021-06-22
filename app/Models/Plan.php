<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'url', 'price', 'description'];

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    /**
     * GET Profiles
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();

        return $results;
    }

    /**
     * GET Profiles not linked with this plan
     */
    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('profiles.id', function($query) {
            $query->select('profile_id')
                ->from('plan_profile')
                ->whereRaw("plan_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $profiles;
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }
}
