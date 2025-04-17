@extends('admin.layouts.app')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="/admincp" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="{{ route('cau-lo-de.index') }}">Danh sách bài viết</a>
                    <span class="breadcrumb-item active">Thêm bài viết</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2>Thêm bài viết</h2>
                @include('admin.includes.messages')
                <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST"
                    action="{{ route('cau-lo-de.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Tiêu đề<span class="required">*</span></label>

                        <div class="col-xs-10">
                            <input type="text" placeholder="Tiêu đề" value="{{ old('title') }}" name="title"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Slug</label>

                        <div class="col-xs-10">
                            <input type="text" placeholder="Slug" value="{{ old('slug') }}" name="slug"
                                class="form-control @error('slug') is-invalid @enderror">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Loại<span class="required">*</span></label>
                        <div class="col-xs-10">
                            <select name="type" class="form-control @error('type') is-invalid @enderror">
                                <option value="">-- Chọn loại --</option>
                                @foreach($types as $value => $label)
                                    <option value="{{ $value }}" {{ old('type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Mô tả</label>
                        <div class="col-xs-10">
                            <textarea id="des" rows="5" name="des" placeholder="Mô tả" class="form-control @error('des') is-invalid @enderror">{!! old('des') !!}</textarea>
                            @error('des')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Nội dung<span class="required">*</span></label>
                        <div class="col-xs-10">
                            <textarea rows="20" id="content" name="content" class="form-control my-editor @error('content') is-invalid @enderror">{!! old('content') !!}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="img" class="col-xs-2 control-label">Ảnh thumb<span class="required"></span></label>
                        <div class="col-xs-10">
                            <div class="input input-icon-left input-file">
                                <input id="thumbnail" class="form-control @error('img') is-invalid @enderror" style="max-width: 500px;float: left;"
                                    value="{{ old('img') }}" placeholder="Hình ảnh" type="text" name="img">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"
                                    style="margin-left: 10px">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                                @error('img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-10 offset-xs-2">
                            <img id="holder" style="margin-top:5px;max-width: 150px;">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-xs-4 control-label"></label>

                        <div class="col-xs-6">
                            <input type="submit" name="insert" class="btn btn-success m-r-5" value="Thêm" />
                            <a href="{{ route('cau-lo-de.index') }}" class="btn btn-danger m-r-5">Hủy</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script>
        var route_prefix = "/admincp/laravel-filemanager";
        $('#lfm').filemanager('image', {
            prefix: route_prefix
        });
    </script>
    <script>
        CKEDITOR.replace('content', {

        });
    </script>
@endsection