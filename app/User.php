<?php

namespace App;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'status', 'ip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function theroles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

    public function setTherolesAttribute($roles)
    {
        $this->theroles()->detach();
        if ( ! $roles) return;
        if ( ! $this->exists) $this->save();
        $this->theroles()->attach($roles);
    }

    public function getTherolesAttribute($roles)
    {
        return array_pluck($this->theroles()->get(['id'])->toArray(), 'id');
    }
}
