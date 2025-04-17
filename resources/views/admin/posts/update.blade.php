@extends('admin.layouts.app')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="/admincp" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="{{ route('news.index') }}">Danh sách dự đoán</a>
                    <span class="breadcrumb-item active">Sửa dự đoán</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2>Sửa dự đoán</h2>
                @include('admin.includes.messages')
                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST"
                      action="{{ route('posts.update', $post->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Tiêu đề<span class="required">*</span></label>
                        <div class="col-xs-10">
                            <input type="text" placeholder="Tiêu đề" value="{{ old('title', $post->title) }}" name="title"
                                   class="form-control">
                        </div>
                    </div>
                 
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Mô tả</label>
                        <div class="col-xs-10">
                            <textarea id="des" rows="5" name="des" placeholder="Mô tả"
                                      class="form-control">{!! old('des', $post->des) !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Nội dung<span class="required">*</span></label>
                        <div class="col-xs-10">
                            <textarea rows="20" id="content" name="content" class="form-control my-editor">{{ old('content', $post->content) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="img" class="col-xs-2 control-label">Ảnh hiện tại</label>
                        <div class="col-xs-10">
                            <img id="current-img" src="{{ asset($post->img) }}" width="200px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="img" class="col-xs-2 control-label">Chọn ảnh mới</label>
                        <div class="col-xs-10">
                            <input type="file" id="img" name="img" class="form-control" accept="image/*" onchange="previewImage(event)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="insert" class="btn btn-success  m-r-5" value="Update"/>
                            <a href="{{ route('news.index') }}" class="btn btn-danger  m-r-5">Hủy</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        var route_prefix = "/laravel-filemanager";
        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>
    <script>
        CKEDITOR.replace('content', {
            filebrowserImageBrowseUrl: '/admincp/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/admincp/laravel-filemanager/upload?type=Images&_token=' + document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            filebrowserBrowseUrl: '/admincp/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/admincp/laravel-filemanager/upload?type=Files&_token=' + document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        });

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('current-img');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection