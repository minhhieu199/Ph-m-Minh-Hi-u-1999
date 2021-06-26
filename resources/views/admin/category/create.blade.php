@extends('admin.layout.main')

@section('content')
  <section class="content-header">
      <h1>
       Thêm Danh Mục
        <a  href="{{route('admin.category.index')}}" class="btn  btn-primary">Danh Sách </a>
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thông Tin </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>Danh Mục Cha</label>
                  <select class="form-control" name="parent_id">
                     <option value="0">-- Chọn --</option>
                     @foreach($categories as $cate)
                        <option  value="{{ $cate->id }}">{{ $cate->name }}</option>
                     @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên</label>
                  <input name="name"type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập Tên">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" name="image">

                  
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Vị Trí</label>
                  <input name="position"type="number" class="form-control" id="exampleInputEmail1" value="1">
                </div>

                 <div class="form-group">
                  <label>Loại Danh Mục</label>
                  <select class="form-control" name="type">
                    <option value="1">Sản Phẩm</option>
                    <option value="2">Tin Tức</option>
                    <option value="3">Khác</option>
                  </select>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1" name="is_active"> Hiển Thị
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tạo</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
         

        </div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
    </section>  
@endsection    