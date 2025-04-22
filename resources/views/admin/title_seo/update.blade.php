@extends('admin.layouts.app')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="/admincp" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="{{ route('title-seo.index') }}">Quản lý Title SEO</a>
                    <span class="breadcrumb-item active">Cập nhật Title SEO</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2>Cập nhật Title SEO: {{ $titleSeo->name }}</h2>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form class="form-horizontal" role="form" method="POST" action="{{ route('title-seo.update', $titleSeo->id) }}">
                    @csrf
                    @method('PUT')
                    
                    
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Meta Title<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="title" value="{{ old('title', $titleSeo->title) }}" class="form-control" placeholder="Meta Title">
                           
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">H1</label>
                        <div class="col-sm-10">
                            <input type="text" name="h1" value="{{ old('h1', $titleSeo->h1) }}" class="form-control" placeholder="Tiêu đề H1">
                           
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Meta Description<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <textarea name="description" rows="3" class="form-control" placeholder="Meta Description">{{ old('description', $titleSeo->description) }}</textarea>
                           
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Meta Keywords<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <textarea name="keywords" rows="3" class="form-control" placeholder="Meta Keywords">{{ old('keywords', $titleSeo->keywords) }}</textarea>
                           
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('title-seo.index') }}" class="btn btn-danger">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection