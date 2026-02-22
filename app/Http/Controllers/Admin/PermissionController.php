<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function store(Request $request)
    {
        Permission::create(['name' => $request->name]);
        return redirect()->back()->with('success', 'Permission created');
    }
}
