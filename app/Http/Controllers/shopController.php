<?php

namespace App\Http\Controllers;
use App\Setting;
use App\contact;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function __construct()
    {
        $settings = Setting::first();
        // Chia sẻ dữ qua tất các layout
        view()->share([
            'settings' => $settings,

        ]);
    }

    //trang chủ
    public function index()
    {
    	return view('shop.index');
    }


    //danh-muc-san-pham
    public function listproduct()
    {
    	return view('shop.listproduct');
    }
    //chi-tiết-sản-phẩm
    public function productdetail()
    {
    	return view('shop.productdetail');
    }


    //trang liên hệ
    public function contact()
    {
        return view('shop.contact');
    }

    public function contactStore(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email'
        ]);

        //luu vào csdl
        $contact = new contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->content = $request->input('content');
        $contact->save();

        // chuyển về trang chủ
        return redirect('/');
    }

}
