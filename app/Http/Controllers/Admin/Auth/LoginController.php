<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Hash;
use URL;
use Common;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function login(LoginRequest $request)
    {
        $model = Admin::where('email', $request->input('email'))->where('is_admin', true)->first();

        if ($model) {
            if (Hash::check($request->input('password'), $model->password)) {
                Auth::guard('admin')->login($model);
                return redirect('admin/index');
            } else {
                $message = config('params.msg_error') . ' Invaid email or password !' . config('params.msg_end');
                $request->session()->flash('message', $message);
                return redirect('admin/login');
            }
        } else {
            $message = config('params.msg_error') . ' Email not found !' . config('params.msg_end');
            $request->session()->flash('message', $message);
            return redirect('admin/login');
        }
        return view('admin.auth.login');
    }

    public function Logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
