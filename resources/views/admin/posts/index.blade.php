@extends('admin.layouts.app')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="/admincp" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <span class="breadcrumb-item active">Danh sách dự đoán</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2>Danh sách dự đoán</h2>
                @include('admin.includes.messages')
              

                <div class="m-t-25">
                    <div class="table-responsive">
                        <form>
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <input value="{{ old('keyword') }}" type="text" class="form-control mb-2"
                                        name="keyword" id="keyword" placeholder="Tìm kiếm ...">
                                </div>

                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2"><i
                                            class="ace-icon fa fa-search"></i> Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                        @if (count($posts))
                            <table class="table table-bordered" id="newsIndex">
                                <thead>
                                    <tr>
                                        <th style="width: 15%">Tiêu đề</th>
                                        <th style="width: 30%">Mô tả</th>
                                        <th style="width: 30%">Nội dung</th>
                                      
                                        <th style="width: 15%">img</th>
                                        <th>Thông tin</th>
                                        <th style="width: 20%">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody id="bxbCat">
                                    @foreach ($posts as $key => $row)
                                        <tr id="row-{{ $row->id }}">
                                            <td>{{ $row->title }}</td>
                                            <td> {{ $row->des }}</td>
                                            <td> {{ substr($row->content, 0, 200) . '...' }}</td>
                                           
                                            <td>
                                                <img src="{{ asset($row->img) }}" width="100px">
                                            </td>
                                            <td>
                                                    @if ($row->category_id == 1)
                                                        Miền Bắc
                                                    @elseif ($row->category_id == 2)
                                                        Miền Trung
                                                    @elseif ($row->category_id == 3)
                                                        Miền Nam
                                                    @endif
                                                <br>

                                                @if ($row->province)
                                                    <strong>Tỉnh: </strong> {{ $row->province->name }}<br>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('posts.edit', $row->id) }}"><i
                                                        class="fa fa-edit"></i>&nbsp;Sửa</a>&nbsp;-&nbsp;
                                               
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="txt-center" style="margin: 10px;padding-bottom: 10px;">
                                {!! $posts->links('pagination::bootstrap-4') !!}
                            </div>
                        @else
                            <h4 class="ml-10 red">Không tồn tại bản ghi nào!</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
