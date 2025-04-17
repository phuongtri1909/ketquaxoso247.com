@extends('admin.layouts.app')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="/admincp" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <span class="breadcrumb-item active">Danh sách bài viết</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2>Danh sách bài viết</h2>
                @include('admin.includes.messages')

                <!-- Filter Form -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <form action="{{ route('cau-lo-de.index') }}" method="GET" class="form-inline">
                            <div class="form-group mr-2">
                                <label for="type" class="mr-2">Loại:</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="">-- Tất cả --</option>
                                    @foreach($types as $value => $label)
                                        <option value="{{ $value }}" {{ request('type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Lọc</button>
                            @if(request()->has('type') && request('type') != '')
                                <a href="{{ route('cau-lo-de.index') }}" class="btn btn-secondary ml-2">Reset</a>
                            @endif
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('cau-lo-de.create') }}" class="btn btn-success m-r-5 btn-sm">Thêm</a>
                    </div>
                </div>
                
                <div class="m-t-25">
                    <div class="table-responsive">
                        @if(count($posts))
                            <table class="table table-bordered" id="newsIndex">
                                <thead>
                                <tr>
                                    <th style="width: 15%">Tiêu đề</th>
                                    <th style="width: 15%">Loại</th>
                                    <th style="width: 15%">Mô tả</th>
                                    <th style="width: 25%">Nội dung</th>
                                    <th style="width: 15%">Ảnh</th>
                                    <th style="width: 15%">Chức năng</th>
                                </tr>
                                </thead>
                                <tbody id="bxbCat">
                                @foreach ($posts as $key => $row)
                                    <tr id="row-{{ $row->id }}">
                                        <td>{{ $row->title }}</td>
                                        <td>
                                            @php
                                                $typeLabels = [
                                                    'soi-cau-vip' => 'Soi cầu VIP',
                                                    'nuoi-lo-khung' => 'Nuôi lô khung',
                                                    'nuoi-de-khung' => 'Nuôi đề khung'
                                                ];
                                                $badgeClass = [
                                                    'soi-cau-vip' => 'badge-success',
                                                    'nuoi-lo-khung' => 'badge-primary',
                                                    'nuoi-de-khung' => 'badge-warning'
                                                ];
                                            @endphp
                                            <span class="badge {{ $badgeClass[$row->type] ?? 'badge-secondary' }}">
                                                {{ $typeLabels[$row->type] ?? $row->type }}
                                            </span>
                                        </td>
                                        <td>{{ $row->des }}</td>
                                        <td>{{ substr(strip_tags($row->content), 0, 150).'...' }}</td>
                                        <td>
                                            <img src="{{ $row->img }}" width="100px">
                                        </td>
                                        <td>
                                            <a href="{{route('cau-lo-de.edit',$row->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;Sửa</a>
                                            <a href="javascript:void(0);" data-id="{{ $row->id }}" class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>&nbsp;Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="txt-center" style="margin: 10px;padding-bottom: 10px;">
                                {!! $posts->links('pagination::bootstrap-4') !!}
                            </div>
                        @else
                            <h4 class="ml-10 text-danger">Không tồn tại bản ghi nào!</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="confirm" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">Bạn có muốn xóa ?</div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Xóa</button>
                    <button type="button" data-dismiss="modal" class="btn">Thoát</button>
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script type="text/javascript">
        // Auto-submit form when changing type selection
        document.getElementById('type').addEventListener('change', function() {
            this.form.submit();
        });
    
        $('.delete').on('click', function (e) {
            var id = $(this).attr('data-id');
            var url = '/admincp/cau-lo-de/' + id;
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#confirm').modal({backdrop: 'static'})
                    .one('click', '#delete', function () {
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {_token:CSRF_TOKEN},
                            success: function (res) {
                                if (res.code === 1) {
                                    $('#row-' + id).remove();
                                    toastr.success(res.msg);
                                } else {
                                    toastr.error(res.msg);
                                }
                            }
                        });
                    });
        });
    </script>
@endsection