@extends('admin.layouts.app')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="/admincp" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="{{ route('posts.index') }}">Danh sách dự đoán</a>
                    <span class="breadcrumb-item active">Thêm dự đoán</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2>Thêm dự đoán</h2>
                @include('admin.includes.messages')
                <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST"
                    action="{{ route('news.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Tiêu đề<span class="required">*</span></label>

                        <div class="col-xs-10">
                            <input type="text" placeholder="Tiêu đề" value="{{ old('title') }}" name="title"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Slug</label>

                        <div class="col-xs-10">
                            <input type="text" placeholder="Slug" value="{{ old('Slug') }}" name="slug"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Mô tả</label>
                        <div class="col-xs-10">
                            <textarea id="des" rows="5" name="des" placeholder="Mô tả" class="form-control">{!! old('des') !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Nội dung<span class="required">*</span></label>
                        <div class="col-xs-10">
                            <textarea rows="20" id="content" name="content" class="form-control my-editor">{!! old('content') !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="img" class="col-xs-2 control-label">Ảnh thumb<span class="required"></span></label>
                        <div class="col-xs-10">
                            <div class="input input-icon-left input-file">
                                <input id="thumbnail" class="form-control" style="max-width: 500px;float: left;"
                                    value="{{ old('img') }}" placeholder="Hình ảnh" type="text" name="img">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"
                                    style="margin-left: 10px">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-2 control-label">Meta title</label>

                        <div class="col-xs-10">
                            <input type="text" placeholder="Meta title" value="{{ old('meta_title') }}" name="meta_title"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Meta description</label>

                        <div class="col-xs-10">
                            <textarea id="meta_description" rows="5" name="meta_description" placeholder="Meta description"
                                class="form-control">{!! old('meta_description') !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label"></label>

                        <div class="col-xs-6">
                            <input type="submit" name="insert" class="btn btn-success  m-r-5" value="Thêm" />
                            <a href="{{ route('news.index') }}" class="btn btn-danger  m-r-5">Hủy</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
  
   
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
   
    <script>
        CKEDITOR.replace('content', {
          
        });
    </script>
@endsection