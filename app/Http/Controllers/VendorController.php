<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vendor::all(); // lấy toàn bộ dữ liệu
        // gọi đến view
        return view('admin.vendor.index', [
            'data' => $data // truyền dữ liệu sang view Index
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate dữ liệu


        // bước 1 : nhận được data từ request
        //$name = $_POST['name'];
        $name = $request->input('name'); // lấy dữ liệu từ form
        $email = $request->input('email'); // tên
        $phone = $request->input('phone'); // vị trị
        $website = $request->input('website'); // hiển thị
        $address = $request->input('adress'); // hiển thị
        $position = $request->input('position'); // hiển thị
        $is_active = $request->input('is_active'); // hiển thị




        // bươc 2:
        $vendor = new Vendor(); // tên bảng =>  class
        $vendor->name = $name; // tên cột => thuộc tính của Class
        $vendor->email = $email;
        $vendor->slug = str_slug($name);
        $vendor->website = $website;
        $vendor->address = $address;
        $vendor->position = $position;
        $vendor->is_active = $is_active ? $is_active : 0;

        // xử lý lưu ảnh
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // tên file image
            $filename = $file->getClientOriginalName(); // tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/vendor/'; // uploads/brand ; uploads/vendor
            // Thực hiện upload file
            $file->move($path_upload,$filename);

            $vendor->image = $path_upload.$filename;
        }

        $vendor->save();

        // bước 3 : chuyển về trang danh sách
        // header('Location: http://mvc.local:8888/?method=danhsach&controller=user');

        return redirect()->route('admin.vendor.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // Sử dụng hàm findorFail tìm kiếm theo Id, nếu tìm thấy sẽ trả về object , nếu không trả về lỗi
        $vendor = Vendor::findorFail($id);

        return view('admin.vendor.edit', [
            'vendor' => $vendor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        //Lấy đối tượng  và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $vendor = Vendor::findorFail($id);
        $vendor->name = $request->input('name');
        $vendor->slug = str_slug($request->input('name')); // slug


        // email
        $vendor->email = $request->input('email');
        // phone
        $vendor->phone = $request->input('phone');

        if ($request->hasFile('new_image')) { // dòng này Kiểm tra xem có image có được chọn
            // xóa file cũ
            @unlink(public_path($vendor->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get new_image
            $file = $request->file('new_image');
            // đặt tên cho file new_image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/category/';
            // Thực hiện upload file
            $request->file('new_image')->move($path_upload,$filename);

            $vendor->image = $path_upload.$filename; // gán giá trị ảnh mới cho thuộc tính image của đối tượng
        }

            // website
            $vendor->website = $request->input('website');

        // địa chỉ
        $vendor->address = $request->input('address');
        // Trạng thái

        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $vendor->is_active = $request->input('is_active');
        }
        // Vị trí
        $vendor->position = $request->input('position');

        // Lưu
        $vendor->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Vendor::destroy($id); // DELETE FROM categories WHERE id = 56

        return response()->json(['status' => true],200);
    }
}
