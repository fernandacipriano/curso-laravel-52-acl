<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Permission;
use App\Post;

class PainelController extends Controller
{
    public function index()
    {
        $totalUsers = '';//User::count();
        $totalRoles = '';//Role::count();
        $totalPermissions = '';//Permission::count();
        $totalPosts = '';//Post::count();
        $roles = auth()->user()->roles;
        $permissoes = "";
        foreach(auth()->user()->roles as $role){
          $permissions = $role->permissions;
          foreach($permissions as $permission){
            $permissoes .= $permission->name."|";
          }
        }


        return view('painel.home.index', compact('totalUsers', 'totalRoles', 'totalPermissions', 'totalPosts', 'roles', 'permissoes'));
    }
}
