<!DOCTYPE html>
<html lang="vi-VN">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('decription')">
    <meta name="keywords" content="@yield('keyword')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="alternate" href="{{ url()->current() }}" hreflang="vi-vn" />
    <link rel="alternate" href="{{ url()->current() }}" hreflang="x-default" />
    <meta name="geo.region" content="VN-HCM">
    <meta name="geo.placename" content="Hồ Chí Minh">
    <meta name="geo.position" content="">
    <meta name="ICBM" content="">
    <meta name="DC.title" content="@yield('decription')" />
    <meta name="DC.Source" content="/">
    <meta name="DC.Coverage" content="Vietnam">
    <meta name="RATING" content="GENERAL">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('decription')">
    <meta property="og:url" content="{{ url()->full() }}">
    @if (isset($dudoan['img']))
        @php
            $img_dt = $dudoan['img'];
        @endphp
        <meta property="og:image" content="{{ url($img_dt) }}">
    @else
        <meta property="og:image" content="{{ url('frontend/images/logosite.png') }}">
    @endif
    <meta property="og:site_name" content="{{ $_SERVER['HTTP_HOST'] }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ $_SERVER['HTTP_HOST'] }}">
    <meta name="twitter:creator" content="{{ $_SERVER['HTTP_HOST'] }}">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('decription')">
    <meta name="twitter:image" content="">
    <meta property="article:publisher" content="">
    <meta property="article:author" content="{{ $_SERVER['HTTP_HOST'] }}" />
    <meta property="article:section" content="Lottery" />
    <meta property="article:tag" content="@yield('decription')" />
    <meta name="AUTHOR" content="{{ $_SERVER['HTTP_HOST'] }}" />
    <meta name="COPYRIGHT" content="Copyright (C) {{ date('Y') }} {{ $_SERVER['HTTP_HOST'] }}" />
    <link rel='index' title='Kết quả xổ số' href='{{ route('home') }}' />
    <link rel="image_src" type="image/jpeg" href="{{ url('frontend/images/logosite.png')}}">
    <link rel="shortcut icon" size="48x48" href="{{ url('frontend/images/favicon.ico') }}">
    <link rel="icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/png/x-icon">
    <meta name="theme-color" content="#ED1C25">
    <meta name="REVISIT-AFTER" content="1 DAYS">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=2,minimum-scale=1,shrink-to-fit=no">
    <meta name="csrf-param" content="_csrf">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" type="text/css" href="{{ url('frontend/css/main.css') }}" media="all">
    <script src="{{ url('frontend/js/jquery.3.4.1.min.js') }}"></script>

    @php
        $htmlContent = \App\Models\HtmlContent::where('key', 'header')->first();
    @endphp

    @if ($htmlContent)
        {!! $htmlContent->content !!}
    @endif
</head>

<body>
    <div id="menu-mobile-backdrop" onclick="showDrawerMenu()"></div>
    <header>
        <div class="bg-white">
            <div class="">
                <h1 class="taskbar text-center">@yield('h1')</h1>

                <div class="top-info clearfix" id="top-info">
                    <button class="navbar-toggle collapsed fl" aria-label="navbar" type="button"
                        onclick="showDrawerMenu()">
                        <span class="icon-bar"></span><span class="icon-bar"></span><span
                            class="icon-bar"></span></button>
                    <div class="logo">
                        <a class="txtlogo w-auto" href="{{ route('home') }}"
                            title="KQXS - XS - Xổ Số Kiến Thiết 3 miền hôm nay - XS3M">
                            <img src="/frontend/images/logosite.png?v=2" alt="" style="width: 350px; height: 70px;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <nav id="nav">
            <div class="nav-mobi">
                <ul class="nav-mobile clearfix" id="nav-hozital-mobile">
                    <li class="fl clearfix "><a href="{{ route('xsmb') }}" title="XSMB">XSMB</a>
                    </li>
                    <li class="fl clearfix "><a href="{{ route('xsmn') }}" title="XSMN">XSMN</a>
                    </li>
                    <li class="fl clearfix "><a href="{{ route('xsmt') }}" title="XSMT">XSMT</a>
                    </li>
                    <li class="fl clearfix "><a href="{{ route('dudoan.xsmb') }}" title="Dự đoán">Dự đoán</a></li>
                    <li class="fl clearfix "><a href="{{ route('tk.dac-biet-tuan') }}" title="Thống kê">T.Kê</a>
                    </li>
                </ul>
            </div>
            <style>
                @media (min-width: 768px) {
                    #nav-horizontal-list {
                        display: flex;
                        justify-content: center;
                    }
                }

                @keyframes sparkle {
                    0% {
                        background-position: 0% 50%;
                    }

                    50% {
                        background-position: 100% 50%;
                    }

                    100% {
                        background-position: 0% 50%;
                    }
                }

                .sparkle {
                    background-size: 400% 400%;
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    animation: sparkle 3s ease infinite;
                }
            </style>

            @if ($linkHeaders->count() > 0)
                <div class="bg-white container mt-3">
                    <div class="text-center">
                        @foreach ($linkHeaders as $item)
                            <?php
                            // Tạo 3 màu random dạng hex cho gradient
                            $color1 = sprintf('#%06X', mt_rand(0, 0xffffff));
                            $color2 = sprintf('#%06X', mt_rand(0, 0xffffff));
                            $color3 = sprintf('#%06X', mt_rand(0, 0xffffff));
                            ?>
                            <a class="fw-bold sparkle"
                                style="
                            background: linear-gradient(270deg, {{ $color1 }}, {{ $color2 }}, {{ $color3 }});
                            background-size: 400% 400%;
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            margin-right: 10px;
                            margin-bottom: 10px;
                            display: inline-block;
                            color: #0000008c;
                            text-decoration: underline;
                            "
                                href="{{ $item->link }}">
                                {{ $item->title }}
                            </a>
                        @endforeach
                    </div>
            @endif
            </div>

            <div class="nav-pc" id="nav-horizontal">
                <ul class="main nav-horizontal clearfix" id="nav-horizontal-list">
                    <li class="menu-header dsp-mobile" style="min-height: 40px">
                        <span class="close-button xl-hidden" onclick="showDrawerMenu()"><img width="24"
                                height="24" src="/frontend/images/left-arrow-white.png" class="sm-only"
                                alt="arrow-white"> </span>

                        {{-- <div class="home-logo"> --}}
                        {{-- <a href="/" --}}
                        {{-- title="KQXS - XS - Xổ Số Kiến Thiết 3 miền hôm nay - XS3M"><img --}}
                        {{-- data-src="/frontend/images/favicon.ico" src="data:," --}}
                        {{-- class="sm-only lazy" alt="ic_launcher"></a> --}}
                        {{-- </div> --}}
                    </li>
                    <li class="fl clearfix @if (request()->routeIs('home.thu*') || request()->routeIs('home.cn') || request()->routeIs('home')) active @endif"><a
                            href="{{ route('home') }}" class="fl" title="XSMB"><i class="fa-solid fa-house"></i></a>
                    </li>
                    <li class="fl clearfix @if (request()->routeIs('xsmb.thu*') || request()->routeIs('xsmb.cn') || request()->routeIs('xsmb')) active @endif"><a
                            href="{{ route('xsmb') }}" class="fl" title="XSMB">XSMB</a><span
                            onclick="expand('_a_xsmb');this.classList.toggle('active');"
                            class="in-block ic arr-d fr"></span>
                        <ul id="_a_xsmb" class="menu-c2">
                            <li><a href="{{ route('xsmb.thu_2') }}" title="XSMB Thứ 2"><strong>Thứ
                                        2</strong></a></li>
                            <li><a href="{{ route('xsmb.thu_3') }}" title="XSMB Thứ 3"><strong>Thứ
                                        3</strong></a></li>
                            <li><a href="{{ route('xsmb.thu_4') }}" title="XSMB Thứ 4"><strong>Thứ
                                        4</strong></a></li>
                            <li><a href="{{ route('xsmb.thu_5') }}" title="XSMB Thứ 5"><strong>Thứ
                                        5</strong></a></li>
                            <li><a href="{{ route('xsmb.thu_6') }}" title="XSMB Thứ 6"><strong>Thứ
                                        6</strong></a></li>
                            <li><a href="{{ route('xsmb.thu_7') }}" title="XSMB Thứ 7"><strong>Thứ
                                        7</strong></a></li>
                            <li><a href="{{ route('xsmb.cn') }}" title="XSMB Chủ nhật"><strong>Chủ
                                        nhật</strong></a></li>
                        </ul>
                    </li>
                    <li class="fl clearfix @if (request()->routeIs('xsmn.thu*') || request()->routeIs('xsmn.cn') || request()->routeIs('xsmn')) active @endif"><a
                            href="{{ route('xsmn') }}" class="fl" title="XSMN">XSMN</a><span
                            onclick="expand('_a_xsmn');this.classList.toggle('active');"
                            class="in-block ic arr-d fr"></span>
                        <ul id="_a_xsmn" class="menu-c2">
                            <li><a href="{{ route('xsmn.thu_2') }}" title="XSMN Thứ 2"><strong>Thứ
                                        2</strong></a></li>
                            <li><a href="{{ route('xsmn.thu_3') }}" title="XSMN Thứ 3"><strong>Thứ
                                        3</strong></a></li>
                            <li><a href="{{ route('xsmn.thu_4') }}" title="XSMN Thứ 4"><strong>Thứ
                                        4</strong></a></li>
                            <li><a href="{{ route('xsmn.thu_5') }}" title="XSMN Thứ 5"><strong>Thứ
                                        5</strong></a></li>
                            <li><a href="{{ route('xsmn.thu_6') }}" title="XSMN Thứ 6"><strong>Thứ
                                        6</strong></a></li>
                            <li><a href="{{ route('xsmn.thu_7') }}" title="XSMN Thứ 7"><strong>Thứ
                                        7</strong></a></li>
                            <li><a href="{{ route('xsmn.cn') }}" title="XSMN Chủ nhật"><strong>Chủ nhật</strong></a>
                            </li>
                        </ul>
                    </li>
                    <li class="fl clearfix @if (request()->routeIs('xsmt.thu*') || request()->routeIs('xsmt.cn') || request()->routeIs('xsmt')) active @endif"><a
                            href="{{ route('xsmt') }}" class="fl" title="XSMT">XSMT</a><span
                            onclick="expand('_a_xsmt');this.classList.toggle('active');"
                            class="in-block ic arr-d fr"></span>
                        <ul id="_a_xsmt" class="menu-c2">
                            <li><a href="{{ route('xsmt.thu_2') }}" title="XSMT Thứ 2"><strong>Thứ
                                        2</strong></a></li>
                            <li><a href="{{ route('xsmt.thu_3') }}" title="XSMT Thứ 3"><strong>Thứ
                                        3</strong></a></li>
                            <li><a href="{{ route('xsmt.thu_4') }}" title="XSMT Thứ 4"><strong>Thứ
                                        4</strong></a></li>
                            <li><a href="{{ route('xsmt.thu_5') }}" title="XSMT Thứ 5"><strong>Thứ
                                        5</strong></a></li>
                            <li><a href="{{ route('xsmt.thu_6') }}" title="XSMT Thứ 6"><strong>Thứ
                                        6</strong></a></li>
                            <li><a href="{{ route('xsmt.thu_7') }}" title="XSMT Thứ 7"><strong>Thứ
                                        7</strong></a></li>
                            <li><a href="{{ route('xsmt.cn') }}" title="XSMT Chủ nhật"><strong>Chủ nhật</strong></a>
                            </li>
                        </ul>
                    </li>
                    <li class="fl clearfix @if (url()->full() == route('xsmb.skq')) active @endif"><a
                            href="{{ route('xsmb.skq') }}" class="fl" title="Sổ kết quả">Sổ kết quả</a><span
                            onclick="expand('_a_sokq');this.classList.toggle('active');"
                            class="in-block ic arr-d fr"></span>
                        <ul id="_a_sokq" class="menu-c2">
                            <li><a href="{{ route('xsmb.skq') }}" title="Sổ kết quả MB"><strong>Sổ kết quả
                                        MB</strong></a></li>
                            <li><a href="{{ route('xsmt.skq') }}" title="Sổ kết quả MT"><strong>Sổ kết quả
                                        MT</strong></a></li>
                            <li><a href="{{ route('xsmn.skq') }}" title="Sổ kết quả MN"><strong>Sổ kết quả
                                        MN</strong></a></li>
                        </ul>
                    </li>
                    <li class="fl clearfix @if (url()->full() == route('vietlott')) active @endif"><a
                            href="{{ route('vietlott') }}" class="fl" title="Vietlott">Vietlott</a><span
                            onclick="expand('_a_vietlott');this.classList.toggle('active');"
                            class="in-block ic arr-d fr"></span>
                        <ul id="_a_vietlott" class="menu-c2">
                            <li><a href="{{ route('mega645') }}" title="Mega 645"><strong>Mega 645</strong></a></li>
                            <li><a href="{{ route('power655') }}" title="Power 655"><strong>Power 655</strong></a>
                            </li>
                            {{-- <li><a href="#" title="Max 3D"><strong>Max --}}
                            {{-- 3D</strong></a></li> --}}
                            {{-- <li><a href="#" title="Max 3D pro"><strong>Max 3D pro</strong></a></li> --}}
                        </ul>
                    </li>

                    <style>
                        .menu-c2,
                        .menu-c3 {
                            display: none;
                            position: absolute;
                            background-color: #fff;
                            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                            z-index: 1;
                        }

                        .menu-c2 li,
                        .menu-c3 li {
                            position: relative;
                        }

                        .menu-c2 li:hover>.menu-c3,
                        .menu-c3 li:hover>.menu-c3 {
                            display: block;
                        }

                        .menu-c2 li:hover>ul,
                        .menu-c3 li:hover>ul {
                            display: block;
                        }

                        .text-black {
                            color: black;
                        }
                    </style>

                    <li class="fl clearfix">
                        <a href="{{ route('dudoan.xsmb') }}" class="fl" title="Dự đoán">Dự đoán</a>
                        <span onclick="expand('_a_dudoan');this.classList.toggle('active');"
                            class="in-block ic arr-d fr"></span>
                        <ul id="_a_dudoan" class="menu-c2">
                            <li>
                                <a href="{{ route('dudoan.xsmt') }}" title="Dự đoán XSMT"><strong>Dự đoán
                                        XSMT</strong></a>
                                <span onclick="expand('_a_dudoan_xsmt');this.classList.toggle('active');"
                                    class="in-block ic arr-d fr"></span>
                                @if (!empty($posts_mt))
                                    <ul id="_a_dudoan_xsmt" class="menu-c3" style="margin-left:35%">
                                        @foreach ($posts_mt as $item)
                                            <li><a href="{{ route('dudoan.xsmt.date', ['date' => getNgayLink($item->date), 'province_slug' => $item->province->slug_sc]) }}" title="Dự đoán {{ $item->province->name }}"><strong
                                                        class="text-black">Dự đoán
                                                        {{ $item->province->name }}</strong></a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            <li>
                                <a href="{{ route('dudoan.xsmn') }}" title="Dự đoán XSMN"><strong>Dự đoán
                                        XSMN</strong></a>
                                <span onclick="expand('_a_dudoan_xsmn');this.classList.toggle('active');"
                                    class="in-block ic arnr-d fr"></span>
                                    @if (!empty($posts_mn))
                                    <ul id="_a_dudoan_xsmn" class="menu-c3" style="margin-left:35%">
                                        @foreach ($posts_mn as $item)
                                            <li><a href="{{ route('dudoan.xsmn.date',['date' => getNgayLink($item->date), 'province_slug' => $item->province->slug_sc] ) }}" title="Dự đoán {{ $item->province->name }}"><strong
                                                        class="text-black">Dự đoán
                                                        {{ $item->province->name }}</strong></a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            <li>
                                <a href="{{ route('dudoan.xsmb') }}" title="Dự đoán XSMB"><strong>Dự đoán
                                        XSMB</strong></a>
                            </li>
                        </ul>
                    </li>
                    <li class="fl clearfix @if (url()->full() == route('quay_thu.mb')) active @endif"><a
                            href="{{ route('quay_thu.mb') }}" class="fl" title="Quay thử">Quay thử</a><span
                            onclick="expand('_a_quayso');this.classList.toggle('active');"
                            class="in-block ic arr-d fr"></span>
                        <ul id="_a_quayso" class="menu-c2">
                            <li><a href="{{ route('quay_thu.mb') }}" title="Quay thử miền Bắc"><strong>Quay
                                        thử miền Bắc</strong></a></li>
                            <li><a href="{{ route('quay_thu.mt') }}" title="Quay thử miền Trung"><strong>Quay
                                        thử miền Trung</strong></a></li>
                            <li><a href="{{ route('quay_thu.mn') }}" title="Quay thử miền Nam"><strong>Quay
                                        thử miền Nam</strong></a></li>
                        </ul>
                    </li>
                    <li class="fl clearfix"><a href="{{ route('tk.dac-biet-tuan') }}" class="fl"
                            title="Thống kê">Thống kê</a><span
                            onclick="expand('_a_statistic');this.classList.toggle('active');"
                            class="in-block ic arr-d fr"></span>
                        <ul id="_a_statistic" class="menu-c2">
                            <li><a href="{{ route('tk.dac-biet-tuan') }}" title="Bảng đặc biệt tuần"><strong>Bảng đặc
                                        biệt tuần</strong></a></li>
                            <li><a href="{{ route('tk.dac-biet-thang') }}" title="Bảng đặc biệt tháng"><strong>Bảng
                                        đặc biệt tháng</strong></a></li>
                            <li><a href="{{ route('tk.dac-biet-nam') }}" title="Bảng đặc biệt năm"><strong>Bảng đặc
                                        biệt năm</strong></a></li>
                            <li><a href="{{ route('tk.lo-gan', 'mb') }}" title="lô gan miền Bắc"><strong>Lô gan miền
                                        Bắc</strong></a></li>
                            <li><a href="{{ route('tk.lo-gan-mt') }}" title="lô gan miền Trung"><strong>Lô gan miền
                                        Trung</strong></a></li>
                            <li><a href="{{ route('tk.lo-gan-mn') }}" title="lô gan miền Nam"><strong>Lô gan miền
                                        Nam</strong></a></li>
                            {{-- <li><a href="#" title="2 số cuối giải đặc biệt"><strong>2 số cuối giải đặc biệt</strong></a> --}}
                            {{-- </li> --}}
                            {{-- <li><a href="#" title="Tần suất loto"><strong>Tần suất loto</strong></a></li> --}}
                            <li><a href="{{ route('tk.thong-ke-nhanh') }}" title="Thống kê nhanh"><strong>Thống kê
                                        nhanh</strong></a></li>
                            <li><a href="{{ route('tk.dau-duoi-loto', 'mb') }}" title="Đầu đuôi loto"><strong>Đầu đuôi
                                        loto</strong></a></li>
                        </ul>
                    </li>
                    <li class="fl clearfix"><a href="{{ route('somo') }}" class="fl" title="Sổ mơ">Sổ
                            mơ</a></li>
                    <li class="fl clearfix"><a href="{{ route('scmb.cau-bach-thu') }}" class="fl"
                            title="Tk cầu">Thống kê
                            cầu</a><span onclick="expand('_a_tkcau');this.classList.toggle('active');"
                            class="in-block ic arr-d fr"></span>
                        <ul id="_a_tkcau" class="menu-c2">
                            <li><a href="{{ route('scmb.cau-bach-thu') }}" title="Cầu bạch thủ"><strong>Cầu bạch
                                        thủ</strong></a></li>
                            {{-- <li><a href="#" title="Cầu lô tô đặc biệt"><strong>Cầu lô tô đặc biệt</strong></a> --}}
                            {{-- </li> --}}
                            <li><a href="{{ route('scmb.cau-truot') }}" title="Cầu lô tô trượt"><strong>Cầu lô tô
                                        trượt</strong></a></li>
                            <li><a href="{{ route('scmb.cau-loto-2nhay') }}" title="Cầu lô tô 2 nháy"><strong>Cầu lô
                                        tô 2 nháy</strong></a>
                            </li>
                            <li><a href="{{ route('scmb.cau-thu') }}" title="Cầu lô tô theo thứ"><strong>Cầu lô tô
                                        theo thứ</strong></a>
                            </li>
                        </ul>
                    </li>
                    <li class="fl clearfix"><a href="{{ route('sodauduoi.xsmb') }}" class="fl"
                            title="Sớ đầu đuôi">Sớ đầu
                            đuôi</a><span onclick="expand('_a_so-dauduoi');this.classList.toggle('active');"
                            class="in-block ic arr-d fr"></span>
                        <ul id="_a_so-dauduoi" class="menu-c2">
                            <li><a href="{{ route('sodauduoi.xsmb') }}" title="Sớ đầu đuôi miền Bắc"><strong>Sớ đầu
                                        đuôi miền
                                        Bắc</strong></a></li>
                            <li><a href="{{ route('sodauduoi.xsmt') }}" title="Sớ đầu đuôi miền Trung"><strong>Sớ đầu
                                        đuôi miền
                                        Trung</strong></a></li>
                            <li><a href="{{ route('sodauduoi.xsmn') }}" title="Sớ đầu đuôi miền Nam"><strong>Sớ đầu
                                        đuôi miền
                                        Nam</strong></a></li>
                        </ul>
                    </li>
                    <li class="fl clearfix">
                        <a href="{{ route('news.list') }}" class="fl" title="Tin tức">Tin tức</a>
                    </li>
                    <li class="fl clearfix">
                        <a href="{{ route('ma-nhung') }}" class="fl" title="Mã nhúng">Mã nhúng</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Code quang cáo-->
        <div>

            <div class="futureads" data-ad-slot="pw_24743"></div>
            <script type="text/javascript">
                (wapTag.Init = window.wapTag.Init || []).push(function() {
                    wAPITag.display("pw_24743")
                })
            </script>
        </div>
    </header>
