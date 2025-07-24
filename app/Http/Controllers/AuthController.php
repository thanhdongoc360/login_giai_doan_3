<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        \Log::info('Login attempt', $credentials);
        $user = \App\Models\User::where('email', $credentials['email'])->first();
        \Log::info('User found:', [$user]);
        if ($user && \Hash::check($credentials['password'], $user->password)) {
            \Log::info('Password match!');
        } else {
            \Log::info('Password NOT match!');
        }
        if (\Auth::guard('web')->attempt($credentials)) {
            $user = \Auth::user();

            if ($user->is_admin) {
            // Redirect admin sang trang quản lý user
                return redirect()->route('admin.users');
            } else {
                // 👇 Trả về trang người dùng thường, hoặc redirect
                return redirect('/')->with('message', 'Đăng nhập thành công');
            }
        }

        // 👇 Trả về lại form login với lỗi
        return back()->withErrors(['login_error' => 'Email hoặc mật khẩu sai']);
    }
}