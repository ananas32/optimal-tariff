<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public $table = 'roles';

    public function thepermits()
    {
        return $this->belongsToMany('App\Permission', 'permission_role', 'role_id', 'permission_id');
    }

    public function setThepermitsAttribute($permits)
    {
        $this->thepermits()->detach();
        if (!$permits) return;
        if (!$this->exists) $this->save();
        $this->thepermits()->attach($permits);
    }

    public function getThepermitsAttribute($permits)
    {
        return array_pluck($this->thepermits()->get(['id'])->toArray(), 'id');
    }
}
