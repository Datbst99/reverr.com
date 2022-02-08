<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|string|email|max:25|unique:users',
            'password' => ['required', 'confirmed', 'min:6', 'max:25', 'regex:/\pN/u', 'regex:/\p{Z}|\p{S}|\p{P}/u'],
        ],[
            'name.required' => 'Vui lòng nhập tên',
            'name.min' => 'Tên phải trên 6 và nhỏ hơn 25 ký tự',
            'name.max' => 'Tên phải trên 6 và nhỏ hơn 25 ký tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Sai định dạng email',
            'email.unique' => 'Email đã tồn tại trong hệ thống',
            'email.max' => 'Email nhập phải dưới 25 ký tự',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.confirmed' => 'Xác nhận lại mật khẩu không chính xác',
            'password.min' => 'Mật khẩu phải trên 6 và nhỏ hơn 25 ký tự',
            'password.max' => 'Mật khẩu phải trên 6 và nhỏ hơn 25 ký tự',
            'password.regex' => 'Mật khẩu phải có ít nhất 1 chữ số và ký tự đặc biệt',
        ]);

        $user = User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole(['admin_post']);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
