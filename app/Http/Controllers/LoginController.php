<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {

//        //validate du lieu
//        $request->validate([
//            'email' => 'required|string|email|max:255',
//            'password' => 'required|string|min:6'
//        ]); //eroor
//
        //lay du lieu tu form login
        $data = [
            'email' => trim($request->input('email')),
            'password' => trim($request->input('password'))
       ];

////        $data = $request->only('email','password'); // trỏ đến only tự động cắt trim()
        $remember = $request->input('remember');
//        // check success
////        tìm trong bảng user xem có dữ liệu truyền vào
        if (Auth::attempt($data , $remember) ){
            return redirect()->route('admin.user.index');
        }

        return redirect()->back()->with('msg', 'Email hoặc Password không chính xác');

    }
    public function logout()
    {
        Auth::logout();
        // chuyển về trang đăng nhập
        return redirect()->route('admin.login');
    }


}
