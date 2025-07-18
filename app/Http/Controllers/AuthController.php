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

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->is_admin) {
                $users = User::all();
                // 👇 Trả về view chứa bảng user
                return view('admin.user.index', compact('users'));
                // return $user;
            } else {
                // 👇 Trả về trang người dùng thường, hoặc redirect
                return redirect('/')->with('message', 'Đăng nhập thành công');
            }
        }

        // 👇 Trả về lại form login với lỗi
        return back()->withErrors(['login_error' => 'Email hoặc mật khẩu sai']);
    }
}