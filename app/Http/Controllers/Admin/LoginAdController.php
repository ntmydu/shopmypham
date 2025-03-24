<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginAdController extends Controller
{
    public function index()
    {
        return view('admin.loginAd', [
            'title' => 'Đăng nhập admin'
        ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $status = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        return redirect()->route('admin');
    }
}