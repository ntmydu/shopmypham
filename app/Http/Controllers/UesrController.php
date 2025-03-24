<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Hash;

class UesrController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.user.list', [
            'users' => $users
        ]);
    }
    public function formregis()
    {
        return view('regis', [
            'title' => 'Đăng kí thành viên'
        ]);
    }
    public function regis(Request $request)
    {


        // // Tạo người dùng mới
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // // Chuyển hướng đến trang đăng nhập hoặc trang khác
        return redirect('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
    public function create()
    {
        return view('admin.user.add');
    }
    public function store(Request $request)
    {
        $users = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect('/admin/user/list')->with('Thêm tài khoản thành công');
        // return $request->name;
    }
    public function view($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.detail', [
            'user' => $user
        ]);
    }
    public function show($id)
    {
        $user = User::findOrFail($id);

        // Trả về view với sản phẩm
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }
    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'name' => 'require|',
        //     'email' => 'require|email|unique:email' . $id,
        //     'phone' => 'nullable|string|max:15',
        //     'address' => 'nullable|string|max:255',
        //     'role_user' => 'required|string|max:50',
        // ]);
        $user = User::FindOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->role_user = $request->input('role_user');


        $user->save();
        return redirect('/admin/user/list')->with('success', 'Cập nhật thành công');
        // return $request->name;
    }
    public function destroy($id)
    {
        $user = User::where('id', $id);
        $user->delete();

        return redirect()->back()->with('success', 'Xóa tài khoản thành công');
    }
}