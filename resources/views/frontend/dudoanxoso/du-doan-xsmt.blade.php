<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$titleSeo = \App\Models\TitleSeo::where('page', 'dudoanxsmt')->first();
?>
@extends('frontend.layouts.app')

@section('title',$titleSeo->title ??  'Dự đoán XSMT - DD XSMT - Dự đoán xổ số Miền Trung')
@section('description',$titleSeo->description ?? 'Dự đoán xổ số miền Trung hôm nay, dự đoán kết quả xổ số miền Trung, dự đoán XSMT, dự đoán XSMT hôm nay, dự đoán XSMT thứ 2, thứ 3, thứ 4, thứ 5, thứ 6, thứ 7')
@section('keywords',$titleSeo->keyword ?? 'Dự đoán xổ số miền Trung, dự đoán XSMT, dự đoán XSMT hôm nay, dự đoán XSMT thứ 2, thứ 3, thứ 4, thứ 5, thứ 6, thứ 7')
@section('h1',$titleSeo->h1 ?? 'Dự đoán xổ số miền Trung hôm nay')

@section('breadcrumb')
    <div class="linkway">
        <div class="main">
            <div class="breadcrumb">
                <ol itemscope="" itemtype="https://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a
                                itemprop="item" href="/" title="Trang chủ"><span itemprop="name">Trang chủ</span>
                            <meta itemprop="position" content="1">
                        </a></li>
                    <li> »</li>
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a
                                itemprop="item" href="{{url()->current()}}"
                                title="Dự đoán XSMT" class="last"><span itemprop="name">Dự đoán XSMT</span>
                            <meta itemprop="position" content="2">
                        </a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-l" style="height: auto !important;">
        <ul class="tab-panel tab-auto">
            <li class="{{ request()->routeIs('dudoan.xsmb') ? 'active' : '' }}"><a href="{{ route('dudoan.xsmb') }}"><strong>Dự đoán MB</strong></a></li>
            <li class="{{ request()->routeIs('dudoan.xsmt') ? 'active' : '' }}"><a href="{{ route('dudoan.xsmt') }}"><strong>Dự đoán MT</strong></a></li>
            @if (!empty($posts_mt))
                @foreach ($posts_mt as $item)
                    <li class="{{ request()->url() == route('dudoan.xsmt.date', ['date' => getNgayLink($item->date), 'province_slug' => $item->province->slug_sc]) ? 'active' : '' }}">
                        <a href="{{ route('dudoan.xsmt.date', ['date' => getNgayLink($item->date), 'province_slug' => $item->province->slug_sc]) }}"
                            title="Dự đoán {{ $item->province->name }}">Dự đoán
                                {{ $item->province->name }}</a>
                    </li>
                @endforeach
            @endif
            <li class="{{ request()->routeIs('dudoan.xsmn') ? 'active' : '' }}"><a href="{{ route('dudoan.xsmn') }}"><strong>Dự đoán MN</strong></a></li>
            @if (!empty($posts_mn))
                @foreach ($posts_mn as $item)
                    <li class="{{ request()->url() == route('dudoan.xsmn.date', ['date' => getNgayLink($item->date), 'province_slug' => $item->province->slug_sc]) ? 'active' : '' }}">
                        <a href="{{ route('dudoan.xsmn.date', ['date' => getNgayLink($item->date), 'province_slug' => $item->province->slug_sc]) }}"
                            title="Dự đoán {{ $item->province->name }}">Dự đoán
                                {{ $item->province->name }}</a>
                    </li>
                @endforeach
            @endif
        </ul>
        <div class="box cate-news" style="height: auto !important;">
            <h2 class="tit-mien"><strong>Dự Đoán kết quả xổ số XSMT hôm nay</strong></h2>
            <ul id="article-list" style="height: auto !important;">
                @foreach($ddXsmt as $item)
                    <?php 
                    $link = $item->link;
                    $link = str_replace("xoso.site","xosotructiep.online",$link);
                    ?>
                    <li class="clearfix">
                        <h3><a href="{{ route('dudoan.xsmt.date', ['date' => getNgayLink($item->date)]) }}"
                                    title="{{$item->title}}"><strong>{{$item->title}}</strong></a></h3><a
                                href="{{ route('dudoan.xsmt.date', ['date' => getNgayLink($item->date)]) }}"
                                title="{{$item->title}}"><img
                                    class="mag-r5 fl" width="120" height="67"
                                    src="{{$item->img}}"
                                    data-src="{{$item->img}}"
                                    title="{{$item->title}}"
                                    alt="{{$item->title}}"> </a>
                        <p class="mag0 sapo">{{$item->des}}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="txt-center phantrang">
            {!! $ddXsmt->links('pagination::bootstrap-4') !!}
        </div>
    </div>
@endsection

