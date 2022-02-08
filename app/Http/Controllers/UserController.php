<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    //show
    public function index(){

        $users = DB::table('model_has_roles')
            ->select('users.id', 'users.username', 'users.email', 'users.created_at', 'roles.name')
            ->join('users',  'model_has_roles.model_id', '=', 'users.id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->orderBy('model_id', 'desc')
            ->get();

        return view('admin.users.show', compact('users'));
    }

    public function add(){
        $roles = Role::select('id', 'name')->get();
        return view('admin.users.add', compact('roles'));
    }

    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => ['required', Rules\Password::defaults()],
                'retype_pass' => ['required', 'same:password', Rules\Password::defaults()],
                'role' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
                'email' => ':attribute nhập đúng định dạng email',
                'unique' => ':attribute đâ tồn tại',
                'same' => ':attribute cần nhập giống mật khẩu',
            ],
            [
                'name' => 'Tên đăng nhập',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'retype_pass' => 'Nhập lại mật khẩu',
                'role' => 'Quyền'
            ]
        );

        $user = User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);
        return redirect()->route('user.show');
    }
    public function edit(){
        return "Sẽ viết chức này sớm nhất";
    }

    public function delete(){
        return "Sẽ sớm cập nhật";
    }
}
