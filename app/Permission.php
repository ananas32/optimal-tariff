<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    //test
    public $table = 'permissions';

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
