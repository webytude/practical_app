<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('is_admin', 0)->get();
        return view('admin.users.index', compact('users'));
    }

    public function view(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.view', compact('user'));
    }

    public function delete(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->rel_language()->delete();
        $user->rel_technicalex()->delete();
        $user->rel_workex()->delete();
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
