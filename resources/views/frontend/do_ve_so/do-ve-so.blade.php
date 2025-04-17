<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
@extends('frontend.layouts.app')

@section('title', 'Dò vé số - Dò vé số online KQ Online')
@section('decription', 'Dò vé số - Dò vé số online KQ Online')
@section('h1', 'Dò vé số - Dò vé số online KQ Online')

@section('breadcrumb')
    <div class="linkway">
        <div class="main">
            <div class="breadcrumb">
                <ol itemscope="" itemtype="https://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a itemprop="item"
                            href="/" title="Trang chủ"><span itemprop="name">Trang chủ</span>
                            <meta itemprop="position" content="1">
                        </a></li>
                    <li> »</li>
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a itemprop="item"
                            href="{{ url()->current() }}" title="Dò vé số" class="last"><span itemprop="name">Dò vé
                                số</span>
                            <meta itemprop="position" content="2">
                        </a>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-l" style="height: auto !important;">
        <div class="content-right bullet tk-block ">
            <div class="title-r"><a class="bg-blue">Dò vé số online - May mắn
                    mỗi ngày!...</a></div>
            <div style="padding: 0 8px">
                <form action="{{ route('do-ve-so') }}" method="get">

                    <div class="mb-1 row">
                        <div class="col-12 col-sm-6 mb-1 mb-sm-0">
                            <div class="row">
                                <label for="date" class="col-2 col-form-label">Ngày: </label>
                                <div class="col-10">
                                    <input name="date" type="date" class="form-control date-do-ve date-do-ve1" id="datepicker"
                                    value="{{ isset($date) ? $date : date('Y-m-d') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="row">
                                <label for="province" class="col-2 col-form-label">Tỉnh: </label>
                                <div class="col-10">
                                    <select name="province" class="form-control province-do-ve" id="province">
    
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pb-2 row">
                        <div class="col-12 col-sm-9 mb-1 mb-sm-0">
                            <div class="row">
                                <label for="lottery" class="col-2 col-form-label">Vé số: </label>
                                <div class="col-10">
                                    <input name="lottery" type="text" class="form-control" id="lottery" value="{{ isset($lotteryNumber) ? $lotteryNumber : "" }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 text-center">
                            <button class="btn btn-primary" id="btn_dove">Dò kết quả</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="content-right bullet tk-block ">
            <div class="title-r"><a class="bg-blue py-2">Kết quả dò vé số ngày: {{ isset($date) ? $date : date('d-m-Y') }}</a></div>
            <div style="padding: 0 8px">
                <div class="bg-light px-4 py-2 border">
                    <p class="my-0">Kết quả mà bạn dò vé số: <span class="fw-bold">{{ isset($province) ? $province->name : "" }}</span></p>
                    <p class="my-0">Loại vé <span class="fw-bold">6</span> chữ số mệnh giá <span class="fw-bold">10,000 đ</span> , mở thưởng ngày <span class="fw-bold">{{ isset($date) ? $date : date('d-m-Y') }}</span> </p>
                    <p class="my-0">Dãy số bạn đã tìm là: <span class="fw-bold">{{ isset($lotteryNumber) ? $lotteryNumber : "" }}</span></p>
                </div>
               <div class="result p-5 text-center">
                    <div class="d-flex justify-content-center">
                        @if (isset($matchingLotteries) && $matchingLotteries != null)

                            <img src="{{ asset('frontend/images/phattai.gif') }}" alt="image" width="90" height="70">
                            <p class="fw-bold text-danger" style="text-shadow: 0 1px 0 #fff, 0 1px 1px;">
                                Chúc mừng bạn !...
                                <br>
                                Vé số của bạn đã trúng thưởng giải 
                                    @switch($matchingLotteries)
                                        @case('gdb')
                                            <span class="text-danger">Đặc biệt</span>
                                            @break
                                        @case('g1')
                                            <span class="text-danger">Giải nhất</span>
                                            @break
                                        @case('g2')
                                            <span class="text-danger">Giải nhì</span>
                                            @break
                                        @case('g3')
                                            <span class="text-danger">Giải ba</span>
                                            @break
                                        @case('g4')
                                            <span class="text-danger">Giải tư</span>
                                            @break
                                        @case('g5')
                                            <span class="text-danger">Giải năm</span>
                                            @break
                                        @case('g6')
                                            <span class="text-danger">Giải sáu</span>
                                            @break
                                        @case('g7')
                                            <span class="text-danger">Giải bảy</span>
                                            @break
                                        @case('g8')
                                            <span class="text-danger">Giải tám</span>
                                            @break
                                        @case('gpdb')
                                            <span class="text-danger">Giải phụ đặc biệt</span>
                                            @break
                                        @case('gkh')
                                            <span class="text-danger">Giải khuyến khích</span>
                                            @break
                                    @endswitch

                                <br>
                                Tổng giá trị giải thưởng là: 
                                @if ($province->mien == 1)
                                    @switch($matchingLotteries)
                                        @case('gdb')
                                            <span class="text-danger">500.000.000</span>
                                            @break
                                        @case('g1')
                                            <span class="text-danger">10.000.000</span>
                                            @break
                                        @case('g2')
                                            <span class="text-danger">5.000.000</span>
                                            @break
                                        @case('g3')
                                            <span class="text-danger">1.000.000</span>
                                            @break
                                        @case('g4')
                                            <span class="text-danger">400.000</span>
                                            @break
                                        @case('g5')
                                            <span class="text-danger">200.000</span>
                                            @break
                                        @case('g6')
                                            <span class="text-danger">100.000</span>
                                            @break
                                        @case('g7')
                                            <span class="text-danger">40.000</span>
                                            @break
                                        @case('gpdb')
                                            <span class="text-danger">25.000.000</span>
                                            @break
                                        @case('gkh')
                                            <span class="text-danger">40.000</span>
                                            @break
                                    @endswitch
                                @else
                                    @switch($matchingLotteries)
                                    @case('gdb')
                                        <span class="text-danger">2.000.000.000</span>
                                        @break
                                    @case('g1')
                                        <span class="text-danger">30.000.000</span>
                                        @break
                                    @case('g2')
                                        <span class="text-danger">15.000.000</span>
                                        @break
                                    @case('g3')
                                        <span class="text-danger">10.000.000</span>
                                        @break
                                    @case('g4')
                                        <span class="text-danger">3.000.000</span>
                                        @break
                                    @case('g5')
                                        <span class="text-danger">1.000.000</span>
                                        @break
                                    @case('g6')
                                        <span class="text-danger">400.000</span>
                                        @break
                                    @case('g7')
                                        <span class="text-danger">200.000</span>
                                        @break
                                    @case('g8')
                                        <span class="text-danger">100.000</span>
                                        @break
                                    @case('gpdb')
                                        <span class="text-danger">50.000.000</span>
                                        @break
                                    @case('gkh')
                                        <span class="text-danger">6.000.000</span>
                                        @break
                                    @endswitch
                                @endif
                            </p>
                        @else
                            <img src="{{ asset('frontend/images/image.gif') }}" alt="image" width="90" height="50">
                            <p class="fw-bold" style="text-shadow: 0 1px 0 #fff, 0 1px 1px;"> Rất tiếc vé số của bạn không trúng giải !
                                <br>
                                Chúc bạn may mắn lần sau!...
                            </p>
                        @endif
                        

                        
                    </div>
                   
               </div>
            </div>
        </div>

    </div>
   
    <script>
        var selectedProvince = '{{ isset($province->slug_sc) ? $province->slug_sc : "" }}';
    </script>
@endsection
