<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    public $table = 'permissions';

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
