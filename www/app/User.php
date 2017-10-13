<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    const secretRoleMapper = [
        '654321' => Role::SUPER_ADMIN,
        '123456' => Role::ADMIN,
    ];

    /**
     * @param $secret
     * @return Role
     */
    public function getRoleBySecret(string $secret = '')
    {
        $roleName = (array_key_exists($secret,
            self::secretRoleMapper)) ? self::secretRoleMapper[$secret] : Role::COMMON_USER;
        return (new Role)->where('name', '=', $roleName)->first();
    }

    public function getRoles()
    {

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

}
