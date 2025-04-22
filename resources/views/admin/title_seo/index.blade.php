@extends('admin.layouts.app')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="/admincp" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <span class="breadcrumb-item active">Quản lý Title SEO</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2>Danh sách Title SEO</h2>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="m-t-25">
                    <div class="table-responsive">
                        @if(count($titleSeos))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                   
                                    <th>Title</th>
                                    <th>H1</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($titleSeos as $titleSeo)
                                    <tr>
                                        <td>{{ $titleSeo->id }}</td>
                                        <td>{{ $titleSeo->name }}</td>
                                       
                                        <td>{{ Str::limit($titleSeo->title, 50) }}</td>
                                        <td>{{ Str::limit($titleSeo->h1, 50) }}</td>
                                        <td>
                                            <a href="{{ route('title-seo.edit', $titleSeo->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Sửa
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="txt-center" style="margin: 10px;padding-bottom: 10px;">
                                {{ $titleSeos->links('pagination::bootstrap-4') }}
                            </div>
                        @else
                            <h4 class="ml-10 text-danger">Không có bản ghi nào!</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection