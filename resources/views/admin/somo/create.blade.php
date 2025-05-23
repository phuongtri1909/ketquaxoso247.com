@extends('admin.layouts.app')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="/admincp" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="{{route('somo.index')}}">Danh sách sổ mơ</a>
                    <span class="breadcrumb-item active">Thêm sổ mơ</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2>Thêm sổ mơ</h2>
                @include('admin.includes.messages')
                <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST"
                      action="{{route('somo.store')}}">
                    {{ csrf_field() }}
                    {{--<div class="form-group">--}}
                        {{--<label class="col-xs-2 control-label">Tiêu đề<span class="required">*</span></label>--}}
                        {{--<div class="col-xs-10">--}}
                            {{--<input type="text" placeholder="Tiêu đề" value="{{ old('title') }}" name="title"--}}
                                   {{--class="form-control" required>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label class="col-xs-2 control-label">Đường dẫn</label>--}}
                        {{--<div class="col-xs-10">--}}
                            {{--<input type="text" placeholder="Đường dẫn" value="{{ old('slug') }}" name="slug"--}}
                                   {{--class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Mơ thấy gì?<span class="required">*</span></label>
                        <div class="col-xs-10">
                            <input type="text" placeholder="Mơ thấy gì?" value="{{ old('mo') }}" name="mo"
                                   class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Link bài viết</label>
                        <div class="col-xs-10">
                            <input type="text" placeholder="Link bài viết" value="{{ old('link') }}" name="link"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Số tương ứng<span class="required">*</span></label>
                        <div class="col-xs-10">
                            <input type="text" placeholder="Số tương ứng" value="{{ old('so') }}" name="so"
                                   class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Nội dung</label>
                        <div class="col-xs-10">
                            <textarea rows="20" id="content" name="content" class="form-control my-editor">{!! old('content') !!}</textarea>
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="img" class="col-xs-2 control-label">Ảnh thumb<span class="required"></span></label>--}}
                        {{--<div class="col-xs-10">--}}
                            {{--<div class="input input-icon-left input-file">--}}
                                {{--<input id="thumbnail" class="form-control" style="max-width: 500px;float: left;"  value="{{ old('img') }}" placeholder="Hình ảnh" type="text" name="img">--}}
                                {{--<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"  style="margin-left: 10px">--}}
                                    {{--<i class="fa fa-picture-o"></i> Choose--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<img id="holder" style="margin-top:15px;max-height:100px;">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label class="col-xs-2 control-label">Meta Title</label>--}}
                        {{--<div class="col-xs-10">--}}
                            {{--<input type="text" placeholder="Meta Title" value="{{ old('meta_title') }}" name="meta_title"--}}
                                   {{--class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label class="col-xs-2 control-label">Meta Description</label>--}}
                        {{--<div class="col-xs-10">--}}
                         {{--<textarea id="meta_keyword" rows="3" name="meta_description" placeholder="Meta Description"--}}
                                   {{--class="form-control">{!! old('meta_description') !!}</textarea>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <label class="col-xs-4 control-label"></label>

                        <div class="col-xs-6">
                            <input type="submit" name="insert" class="btn btn-success m-r-5" value="Thêm"/>
                            <a href="{{route('somo.index')}}" class="btn btn-danger m-r-5">Hủy</a>
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