<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * GET Profiles
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
