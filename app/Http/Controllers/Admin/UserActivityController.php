<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    public function index()
    {
        $activities = LoginHistory::with('user')
            ->orderBy('login_at', 'desc')
            ->paginate(10);

        return view('admin.history.index', compact('activities'));
    }
}
