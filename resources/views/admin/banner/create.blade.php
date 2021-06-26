@extends('admin.layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
        <h1>
            Thêm Mới Banner <a href="{{route('admin.banner.index')}}" class="btn btn-flat btn-success "><i class="fa fa-list"></i> Danh Sách Banner</a>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="form-group">
                                <label for="title">Tiêu Đề</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title ........">
                                @if($errors->has('title'))
                                <p class="text-danger"><strong>Error : </strong> {{ $errors->first('title') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Image :</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control fileName" disabled="" id="fileName">
                                    <input class="file-upload-input" name="image" hidden="hidden" style="position:absolute;" type='file' onchange="readURL(this);" accept="image/*" />
                                    <span class="input-group-btn">
                                        <button type="button"  onclick="$('.file-upload-input').trigger( 'click' )" class="btn btn-info btn-flat">Add Image</button>
                                    </span>
                                </div>
                                
                                <div class="file-upload-content text-center ">
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="url">Url :</label>
                                <input type="text" class="form-control" name="url" id="url" placeholder="Link ........">
                                @if($errors->has('url'))
                                <p class="text-danger"><strong>Error : </strong> {{ $errors->first('url') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="target">Target :</label>
                                <input type="text" class="form-control" name="target" id="target" placeholder="Target ........">
                                @if($errors->has('target'))
                                <p class="text-danger"><strong>Error : </strong> {{ $errors->first('target') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="position">Vị Trí :</label>
                                <input type="number" value="1" class="form-control" name="position">
                            </div>
                            <div class="form-group">
                                <label>Type :</label>
                                <select class="form-control" name="type">
                                    <option value="0"> ---- Null ---- </option>
                                    <option value="1">Sản phẩm</option>
                                    <option value="2">Tin tức</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mô Tả :</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_active" value="1"> Trạng thái
                                </label>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            CKEDITOR.replace('description');
        });
    </script>
@endsection