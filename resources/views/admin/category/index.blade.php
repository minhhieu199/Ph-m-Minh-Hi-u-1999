 @extends('admin.layout.main')

@section('content')
 <section class="content-header">
      <h1>
     Quản lí Danh Mục
        <a  href="{{route('admin.category.create')}}" class="btn  btn-primary">Thêm </a>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Bordered Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th class="text-center">Tên</th>
                   <th class="text-center">Danh Mục Cha</th>
                  <th class="text-center">Hình ảnh</th>
                  <th class="text-center">Vị Trí</th>
                  <th class="text-center">Loại</th>
                  <th class="text-center">Trạng Thái</th>
                  <th class="text-center">Hành Động</th>
                </tr>
                 @foreach($data as $index =>  $item)
                <tr>
                  <td class="text-center">{{ $index }}</td>
                  <td class="text-center">{{ $item->name }}</td>
                  <td class="text-center">
                     @foreach($categories as $cate)
                         @if($item->parent_id === $cate->id)
                            {{ $cate->name }}
                        @endif
                     @endforeach
                  </td>
                  <td class="text-center">
                    @if($item->image)
                  <img width="100" src="{{asset($item->image)}}">
                    @endif
                  </td>
                  <td class="text-center">{{$item->position}}</td>
                  <td class="text-center">
                    @if( $item->type==1)
                      Sản phẩm
                    @elseif( $item->type==2)
                      Tin tức
                    @else
                      Khác
                    @endif
                  </td>
                  <td class="text-center">
                     {!! ($item->is_active == 1) ? '<span class="badge bg-green"> hiển thị </span>' : '<span class="badge bg-red">ẩn</span>'  !!}
                   </td>
                  <td class="text-center">
                    <a href="{{route('admin.category.edit', ['id' => $item->id])}}" class="btn  btn-primary">Sửa</a>
                    <button  type="button" class="btn  btn-danger btnDelete" data-id="{{$item->id}}">Xóa</button>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
              <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin">
                      {{ $data->links() }}
                  </ul>
              </div>
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
                      url: './category/' + id,
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

