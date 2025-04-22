@extends('frontend.layouts.app')

@php
    $titleSeo = \App\Models\TitleSeo::where('page', 'home')->first();
@endphp
@section('title', $titleSeo->title ?? 'KQXS - xổ sổ trực tiếp - Trực tiếp kết quả xổ số hôm nay')
@section('decription', $titleSeo->description ?? 'KQXS - Trực tiếp xổ số hôm nay nhanh và chính xác nhất từ trường quay xổ số hàng ngày. Xem kết quả Xổ số 3 miền siêu chuẩn miễn phí.')
@section('keyword', $titleSeo->keywords ?? 'Xổ số, XS, Trực tiếp kết quả, trực tiếp xổ số, kết quả xổ số, KQXS, xổ số hôm nay, xshn, kết quả xổ số, kqxs, xổ số 3 miền, xs3m, xổ số kiến thiết, xskt')
@section('h1', $titleSeo->h1 ?? 'KQXS - xổ sổ trực tiếp - Trực tiếp kết quả xổ số hôm nay')
@section('content')
    <div class="col-l">
        {{-- <div class="box"> --}}
        {{-- <div class="bg_gray"> --}}
        {{-- <div class=" opt_date_full clearfix"> --}}
        {{-- <label><strong>{{getThu(getThuNumber(date('Y-m-d')))}}</strong> - <input --}}
        {{-- type="text" class="nobor" value="{{date('d/m/Y')}}" id="searchDateMB"/><span --}}
        {{-- class='ic ic-calendar'></span></label> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        <div class="box-kq">
            <div class="box mo-thuong-ngay">
                <div class="tit-mien s16"><strong>Xổ số các tỉnh hôm nay mở thưởng</strong></div>
                <table class="table-fixed">
                    <tbody>
                        <tr style="background-color: #ffeeba">
                            <td class="text-center">XSMB</td>
                            <td class="text-center">XSMT</td>
                            <td class="text-center">
                                XSMN
                            </td>
                        </tr>
                        @for ($i = 0; $i < $maxRows; $i++)
                            <tr>
                                <td class="live_mb text-center">
                                    @if ($i < count($xs_today_mb))
                                        <!-- Hiển thị xổ số tỉnh miền Bắc -->
                                        <div class="">
                                            <a href="{{ route('xstinh.tinh', $xs_today_mb[$i]->slug) }}"
                                                title="Xổ số {{ $xs_today_mb[$i]->name }}">{{ $xs_today_mb[$i]->name }}</a>
                                        </div>
                                    @elseif ($i == count($xs_today_mb))
                                        <!-- Hiển thị Thần Tài khi đã hết các tỉnh miền Bắc -->
                                        <div class="">
                                            <a href="{{ route('xsthantai') }}" title="Thần Tài">Thần Tài</a>
                                        </div>
                                    @elseif ($i == count($xs_today_mb) + 1)
                                        <!-- Hiển thị Điện toán 123 -->
                                        <div class="">
                                            <a href="{{ route('dientoan123') }}" title="Điện toán 123">Điện toán 123</a>
                                        </div>
                                    @elseif ($i == count($xs_today_mb) + 2 && in_array(date('w'), [3, 6]))
                                        <!-- Hiển thị Điện toán 6x36 nếu là thứ 4 hoặc thứ 7 -->
                                        <div class="">
                                            <a href="{{ route('dientoan6x36') }}" title="Điện toán 6x36">Điện toán 6x36</a>
                                        </div>
                                    @elseif (
                                        ($i == count($xs_today_mb) + 3 || ($i == count($xs_today_mb) + 2 && !in_array(date('w'), [3, 6]))) &&
                                            in_array(date('w'), [0, 3, 5]))
                                        <!-- Hiển thị Mega 6/45 nếu là chủ nhật, thứ 4 hoặc thứ 6 -->
                                        <div class="">
                                            <a href="{{ route('mega645') }}" title="Mega 6/45">Mega 6/45</a>
                                        </div>
                                    @elseif ($i >= count($xs_today_mb) + 2 && in_array(date('w'), [2, 4, 6]))
                                        <!-- Hiển thị Power 6/55 nếu là thứ 3, thứ 5 hoặc thứ 7 -->
                                        <div class="">
                                            <a href="{{ route('power655') }}" title="Power 6/55">Power 6/55</a>
                                        </div>
                                    @endif
                                </td>

                                <td class="live_mt text-center">
                                    @if (!empty($xs_today_mt[$i]))
                                        <!-- Hiển thị xổ số tỉnh miền Trung -->
                                        <div class="">
                                            <a href="{{ route('xstinh.tinh', $xs_today_mt[$i]->slug) }}"
                                                title="Xổ số {{ $xs_today_mt[$i]->name }}">{{ $xs_today_mt[$i]->name }}</a>
                                        </div>
                                    @endif
                                </td>

                                <td class="live_mn text-center">
                                    @if (!empty($xs_today_mn[$i]))
                                        <!-- Hiển thị xổ số tỉnh miền Nam -->
                                        <div class="">
                                            <a href="{{ route('xstinh.tinh', $xs_today_mn[$i]->slug) }}"
                                                title="Xổ số {{ $xs_today_mn[$i]->name }}">{{ $xs_today_mn[$i]->name }}</a>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            @include('frontend.home.xsmb', compact('xsmb'))
            @include('frontend.home.xsmn', compact('xsmns'))
            @include('frontend.home.xsmt', compact('xsmts'))
            <div class="mega645">
                <h2 class="tit-mien clearfix">
                    <strong> <a class="title-a" href="{{ route('mega645') }}" title="Xổ số Mega">Kết quả xổ số
                            Mega</a> {{ getThu($kq_mega645->day) }} ngày {{ getNgay($kq_mega645->date) }}</strong>
                </h2>
                <ul class="results">
                    <li id="load_kq_mega_0">
                        <div>
                            <div class="clearfix">
                                <table class="data ctrl-table-jackpot">
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="p-0-jackpot">
                                                <div class="txt-center ctrl-jackpot">
                                                    <span> Giá trị Jackpot: </span>
                                                    <strong>{{ number_format($kq_mega645->jackpot_gt) }} đồng</strong>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="number-list-jackpot">
                                            @php
                                                $daySo = explode('-', $kq_mega645->day_so);
                                                $d = 1;
                                            @endphp
                                            @foreach ($daySo as $value)
                                                <td><i>{{ $value }}</i></td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table class="data2">
                                <tbody>
                                    <tr class="bg-light-vl">
                                        <td>Giải thưởng</td>
                                        <td>Trùng khớp</td>
                                        <td>Số lượng giải</td>
                                        <td>Giá trị giải (đồng)</td>
                                    </tr>
                                    <tr>
                                        <td class="clnote">Jackpot</td>
                                        <td><i></i> <i></i> <i></i> <i></i> <i></i> <i></i></td>
                                        <td>{{ $kq_mega645->jackpot_sl }}</td>
                                        <td class="clnote">{{ number_format($kq_mega645->jackpot_gt) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="clnote">Giải nhất</td>
                                        <td><i></i> <i></i> <i></i> <i></i> <i></i></td>
                                        <td>{{ number_format($kq_mega645->g1_sl) }}</td>
                                        <td>10.000.000</td>
                                    </tr>
                                    <tr>
                                        <td class="clnote">Giải nhì</td>
                                        <td><i></i> <i></i> <i></i> <i></i></td>
                                        <td>{{ number_format($kq_mega645->g2_sl) }}</td>
                                        <td>300.000</td>
                                    </tr>
                                    <tr>
                                        <td class="clnote">Giải ba</td>
                                        <td><i></i> <i></i> <i></i></td>
                                        <td>{{ number_format($kq_mega645->g3_sl) }}</td>
                                        <td>30.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="power655  mega645">
                <h2 class="tit-mien clearfix">
                    <strong> <a class="title-a" href="{{ route('power655') }}" title="Xổ số Power">Kết quả xổ số
                            Power</a>
                        {{ getThu($kq_power655->day) }} ngày {{ getNgay($kq_power655->date) }}</strong>
                </h2>
                <ul class="results">
                    <li id="load_kq_power_0">
                        <div>
                            <div class="clearfix">
                                <table class="data w-50 mb-16">
                                    <tbody>
                                        <tr>
                                            <td colspan="7" class="p-0-jackpot">
                                                <div class="txt-center ctrl-jackpot mb-8">
                                                    <span> Giá trị Jackpot 1: </span>
                                                    <strong>{{ number_format($kq_power655->jackpot1_gt) }} đồng</strong>
                                                </div>
                                                <div class="txt-center ctrl-jackpot">
                                                    <span> Giá trị Jackpot 2: </span>
                                                    <strong>{{ number_format($kq_power655->jackpot2_gt) }} đồng</strong>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $daySo = explode('-', $kq_power655->day_so);
                                            $d = 1;
                                        @endphp
                                        <tr class="ctrl-number-2">
                                            <td><i>{{ $daySo[0] }}</i></td>
                                            <td><i>{{ $daySo[1] }}</i></td>
                                            <td><i>{{ $daySo[2] }}</i></td>
                                            <td><i>{{ $daySo[3] }}</i></td>
                                            <td><i>{{ $daySo[4] }}</i></td>
                                            <td><i>{{ $daySo[5] }}</i></td>
                                            <td><i>{{ $daySo[6] }}</i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table class="data2">
                                <tbody>
                                    <tr class="bg-light-vl">
                                        <td>Giải thưởng</td>
                                        <td>Trùng khớp</td>
                                        <td>Số lượng giải</td>
                                        <td>Giá trị giải (đồng)</td>
                                    </tr>
                                    <tr>
                                        <td class="clnote">Jackpot 1</td>
                                        <td><i></i> <i></i> <i></i> <i></i> <i></i> <i></i></td>
                                        <td>{{ $kq_power655->jackpot1_sl }}</td>
                                        <td class="clnote">{{ number_format($kq_power655->jackpot1_gt) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="clnote">Jackpot 2</td>
                                        <td><i></i> <i></i> <i></i> <i></i> <i></i> <i class="clnote"></i></td>
                                        <td>{{ $kq_power655->jackpot2_sl }}</td>
                                        <td class="clnote">{{ number_format($kq_power655->jackpot2_gt) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="clnote">Giải nhất</td>
                                        <td><i></i> <i></i> <i></i> <i></i> <i></i></td>
                                        <td>{{ number_format($kq_power655->g1_sl) }}</td>
                                        <td>40.000.000</td>
                                    </tr>
                                    <tr>
                                        <td class="clnote">Giải nhì</td>
                                        <td><i></i> <i></i> <i></i> <i></i></td>
                                        <td>{{ number_format($kq_power655->g2_sl) }}</td>
                                        <td>500.000</td>
                                    </tr>
                                    <tr>
                                        <td class="clnote">Giải ba</td>
                                        <td><i></i> <i></i> <i></i></td>
                                        <td>{{ number_format($kq_power655->g3_sl) }}</td>
                                        <td>50.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="box-content">
                <div class="content-news">
                    <h2 class="text-center"><strong> Giới thiệu về trang KQXS - ketquaxoso247.com - XO SO HOM NAY</strong>
                    </h2>
                    <p><a href="{{ route('home') }}"><strong>ketquaxoso247.com</strong> </a> là trang kết quả xổ số trực
                        tuyến nhanh nhất và chính xác nhất tại Việt Nam. Với giao diện thân thiện và dễ sử dụng, xổ sổ trực
                        tiếp giúp người dùng theo dõi <a href="{{ route('home') }}"><strong>kqxs</strong></a> mọi lúc, mọi
                        nơi một cách tiện lợi và nhanh chóng.</p>
                    <p>Theo dõi <a href="{{ route('xsmb') }}"><strong>XSMB</strong></a> - Kết quả xổ số miền Bắc hàng ngày
                        lúc 18h15</p>
                    <p>Theo dõi <a href="{{ route('xsmn') }}"><strong>XSMN</strong></a> - Kết quả xổ số miền Nam hàng ngày
                        lúc 16h15</p>
                    <p>Theo dõi <a href="{{ route('xsmt') }}"><strong>XSMT</strong></a> - Kết quả xổ số miền Trung hàng
                        ngày lúc 17h15</p>
                    <p>Không chỉ trực tiếp <a href="{{ route('home') }}"><strong>KQXS</strong></a> ba miền, <a
                            href="{{ route('home') }}"><strong>ketquaxoso247.com</strong> </a> còn nhiều tiện ích khác
                        dành
                        cho bạn như dự đoán xổ số, thống kê lô tô, xổ số vietlott, xổ số điện toán hoàn toàn miễn phí.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('afterJS')
    <script src="{{ url('frontend/js/lotteryLive.js') }}?v={{ rand(1000, 100000) }}"></script>
    <script type="text/javascript">
        $('.show-text').on('click', function() {
            $('.content-news').removeClass('show-content');
            $(this).addClass('active');
            $('.hiden-text').addClass('active');
        });

        $('.hiden-text').on('click', function() {
            $('.content-news').addClass('show-content');
            $(this).removeClass('active');
            $('.show-text').removeClass('active');
        });

        var d = new Date();
        var utc = d.getTime() + (d.getTimezoneOffset() * 60000);
        var currentdate = new Date(utc + (3600000 * +7));

        var rootPath = '';
        var appKey = '';
        var headingTag = 'h1';
        var interval;
        var timeInter = 1357 * 4; //thoi gian refresh
        //        var currentdate = new Date();
        var hours = currentdate.getHours();
        var minute = currentdate.getMinutes();

        try {
            var liveheader = $('.live-header');
            var btn_liveheader = $('#btn_liveheader');
            var livecontent = $('.live-content');
            var groupId = 0;
            switch (hours) {
                case 16: {
                    groupId = 2;
                    headingTag = 'h2';
                    btn_liveheader.attr("onclick", "clickScroll('mn_kqngay_{{ date('dmY') }}')");
                    btn_liveheader.text("xổ số miền Nam");
                    if (minute >= 10 && minute <= 40) {
                        livecontent.html("Đang TT trực tiếp xổ số miền Nam");
                    } else if (minute > 40) {
                        livecontent.html("KQXS miền Nam");
                    } else {
                        livecontent.html("Tường thuật trực tiếp KQXS miền Nam lúc 16h15");
                    }

                    LiveMN(groupId, appKey, rootPath, headingTag);
                    interval = setInterval("LiveMN(" + groupId + ", '" + appKey + "', '" + rootPath + "', '" + headingTag +
                        "')", timeInter);
                    intervalVariable = setInterval('getRandomTextTN()', 100);
                    liveheader.show();
                    break;
                }

                case 17: {
                    groupId = 3;
                    headingTag = 'h2';
                    btn_liveheader.attr("onclick", "clickScroll('mt_kqngay_{{ date('dmY') }}')");
                    btn_liveheader.text("xổ số miền Trung");
                    if (minute >= 10 && minute <= 40) {
                        livecontent.html("Đang TT trực tiếp xổ số miền Trung");
                    } else if (minute > 35) {
                        livecontent.html("KQXS miền Trung");
                    } else {
                        livecontent.html("Tường thuật trực tiếp KQXS miền Trung lúc 17h15");
                    }

                    LiveMT(groupId, appKey, rootPath, headingTag);
                    interval = setInterval("LiveMT(" + groupId + ", '" + appKey + "', '" + rootPath + "', '" + headingTag +
                        "')", timeInter);
                    intervalVariable = setInterval('getRandomTextTN()', 100);
                    liveheader.show();
                    break;
                }
                case 18: {
                    headingTag = 'h2';
                    btn_liveheader.attr("onclick", "clickScroll('kqngay_{{ date('dmY') }}')");
                    btn_liveheader.text("xổ số miền Bắc");
                    if (minute >= 10 && minute <= 40) {
                        livecontent.html("Đang TT trực tiếp xổ số miền Bắc");
                    } else if (minute > 40) {
                        livecontent.html("KQXS miền Bắc");
                    } else {
                        livecontent.html("Tường thuật trực tiếp KQXS miền Bắc lúc 18h10");
                    }
                    LiveMB(appKey, rootPath, headingTag);
                    interval = setInterval("LiveMB('" + appKey + "', '" + rootPath + "', '" + headingTag + "')", timeInter);
                    intervalVariable = setInterval('getRandomTextMB()', 100);
                    liveheader.show();
                    break;
                }
                default:
                    liveheader.hide();
                    break;
            }

        } catch (e) {
            console.log(e.message);
        }
    </script>
@endsection
