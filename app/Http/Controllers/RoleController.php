<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {

            $permissions = Permission::all()->pluck('name', 'id')->toArray();
            return view('roles.create', ['permissions' => $permissions]);
    }




}
