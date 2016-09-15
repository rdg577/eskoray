<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type', 'active', 'branch_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isSystemAdmin()
    {
        if($this->user_type == 'sys_admin') {
            return true;
        }

        return false;
    }

    public function isBranchAdmin()
    {
        if($this->user_type == 'branch_admin') {
            return true;
        }

        return false;
    }

    public function branch()
    {
        return $this->belongsTo('\App\Branch', 'branch_id');
    }
}
