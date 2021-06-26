@extends('admin.layout.main')
@section('content')
    <section class="content-header">
        <h1>
            Danh Sách Nhà Cung Cấp <a href="{{route('admin.vendor.create')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Thêm Nhà Cung Cấp</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Tên NCC</th>
                                <th>Email</th>
                                <th>Điện Thoại</th>
                                <th>Avart</th>
                                <th>WebSite</th>
                                <th>Vị trí</th>
                                <th>Trạng Thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </tbody>
                            <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @if ($item->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                            <img src="{{asset($item->image)}}" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>{{ $item->website }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td class="text-center">
                                         {!! ($item->is_active == 1) ? '<span class="badge bg-green"> hiển thị </span>' : '<span class="badge bg-red">ẩn</span>'  !!}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('admin.vendor.edit', ['id'=> $item->id])}}" class="btn btn-info">Sửa</a>
                                        <!-- Thêm sự kiện onlick cho nút xóa -->
                                        <a href="javascript:void(0)" class="btn btn-danger btnDelete" data-id="{{$item->id}}" >Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('my_js')
  <script type="text/javascript">
      $( document ).ready(function() {
          // đính kèm token vào mỗi request ajax
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // suAbidEneUPjfI5mHvWdFbSQ1PsM4OYSm73vF7kZ
              }
          });
          $('.btnDelete').click(function (){
              var id = $(this).attr('data-id'); // lấy thuộc tính của thẻ HTML
              var me = this;
              var result = confirm("Bạn có chắc chắn muốn xóa ?");
              if (result == true) { // neu nhấn == ok , sẽ send request ajax
                  $.ajax({
                      url: './vendor/' + id,
                      type: 'DELETE', // method
                      data: {}, // dữ liệu truyền sang nếu có
                      dataType: "json", // kiểu dữ liệu nhận về
                      success: function (res) { // success : kết quả trả về sau khi gửi request ajax
                          if (res.status == true) {
                              $(me).closest('tr').remove();
                          }
                      }
                  });

              }


          });
      });
  </script>
 @endsection

