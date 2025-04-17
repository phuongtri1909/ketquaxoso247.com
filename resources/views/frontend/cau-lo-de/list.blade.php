<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
@extends('frontend.layouts.app')

@php
    $typeLabels = [
        'soi-cau-vip' => 'Soi cầu VIP',
        'nuoi-lo-khung' => 'Nuôi lô khung',
        'nuoi-de-khung' => 'Nuôi đề khung',
    ];

    $pageTitle =
        isset($type) && isset($typeLabels[$type])
            ? $typeLabels[$type] . ' - Dự đoán xổ số chính xác nhất'
            : 'Dự đoán xổ số - Soi cầu VIP, Nuôi lô khung hiệu quả';

    $pageDescription =
        isset($type) && isset($typeLabels[$type])
            ? $typeLabels[$type] . ' - Các cặp số đẹp, dự đoán chính xác kết quả xổ số hôm nay'
            : 'Dự đoán xổ số chuẩn xác từ các chuyên gia, soi cầu VIP, nuôi lô khung, nuôi đề khung hiệu quả';

    $pageH1 = isset($type) && isset($typeLabels[$type]) ? $typeLabels[$type] : 'Dự đoán xổ số';
@endphp

@section('title', $pageTitle)
@section('decription', $pageDescription)
@section('h1', $pageH1)

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
                            href="{{ url()->current() }}" title="{{ $pageH1 }}" class="last"><span
                                itemprop="name">{{ $pageH1 }}</span>
                            <meta itemprop="position" content="2">
                        </a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-l" style="height: auto !important;">
        <div class="box cate-news" style="height: auto !important;">
            <h2 class="tit-mien"><strong>{{ $pageH1 }}</strong></h2>
            <ul id="article-list" style="height: auto !important;">
                @foreach ($news as $item)
                    <li class="clearfix">
                        <h3>
                            @php
                                // Determine the correct route based on post type
                                $routeName = '';
                                $routeParams = $item->slug;
                                if ($item->type == 'soi-cau-vip') {
                                    $routeName = 'soi-cau-vip.detail';
                                } elseif ($item->type == 'nuoi-lo-khung') {
                                    $routeName = 'nuoi-lo-khung.detail';
                                } elseif ($item->type == 'nuoi-de-khung') {
                                    $routeName = 'nuoi-de-khung.detail';
                                } else {
                                    $routeName = 'news.post';
                                }
                            @endphp
                            <a href="{{ route($routeName, $routeParams) }}" title="{{ $item->title }}">
                                <strong>{{ $item->title }}</strong>
                            </a>
                        </h3>
                        <a href="{{ route($routeName, $routeParams) }}" title="{{ $item->title }}">
                            <img class="mag-r5 fl img-fluid" width="120" height="67" src="{{ $item->img }}"
                                data-src="{{ $item->img }}" title="{{ $item->title }}" alt="{{ $item->title }}">
                        </a>
                        <p class="mag0 sapo">{{ $item->des }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="txt-center phantrang">
            {!! $news->links('pagination::bootstrap-4') !!}
        </div>
    </div>
@endsection
