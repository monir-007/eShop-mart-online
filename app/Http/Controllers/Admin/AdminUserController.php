<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function adminRoleManage()
    {
        $adminUser = Admin::where('type', 2)->latest()->get();
        return view('admin.role.admin-role-manage-all', compact('adminUser'));
    }
}
