<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, HasRoles;

    public function checkAdminRole()
    {
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return true;
        }
        return false;
    }

    public function checkManageUsersPermission()
    {
        if (Auth::check() && Auth::user()->can('manage users')) {
            return true;
        }
        return false;
    }
}
