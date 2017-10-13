<?php namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    const ADMIN = 'Admin';
    const SUPER_ADMIN = 'SuperAdmin';
    const COMMON_USER = 'User';
}