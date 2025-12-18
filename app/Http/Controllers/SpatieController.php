<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class SpatieController extends Controller
{
    public function index()
    {
        /*$role = Role::create(['name' => 'writer']);
        $permission = Permission::create(['name' => 'edit articles']);


        $role->givePermissionTo($permission);
        $permission->assignRole($role);*/


        $role = Role::first();
        $user = User::first();
        //$user->assignRole(['writer']);
        //dd($user->hasRole('writer'));

        dd($user->getPermissionsViaRoles());
    }
}
