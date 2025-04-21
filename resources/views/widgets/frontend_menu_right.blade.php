@yield('breadcrumb')
<section class="content main clearfix">
    @yield('content')
    <div class="col-center">
        <div class="content-right bullet live_mb">
            <div class="title-r"><a class="bg-blue" title="Xổ số miền bắc" href="{{ route('xsmb') }}">Xổ số miền bắc</a>
            </div>
            <ul>
                @foreach ($mb_province as $pro)
                    @if (strpos($pro->ngay_quay, $day) !== false)
                        <li @if (url()->full() == route('xstinh.tinh', $pro->slug)) class="active" @endif>
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{ route('xstinh.tinh', $pro->slug) }}"
                                    title="{{ $pro->name }}">{{ $pro->name }}</a>
                                <span class="hidden-mobile icon-live-done me-3" style="display: none"><i
                                        class="fas fa-check-circle text-success"></i></span>
                                <span class="hidden-mobile icon-live-wait me-3" style="display:none">
                                    <div class="live-dot dot-1"></div>
                                    <div class="live-dot dot-2"></div>
                                    <div class="live-dot dot-3"></div>
                                </span>
                            </div>
                        </li>
                    @else
                        <li @if (url()->full() == route('xstinh.tinh', $pro->slug)) class="active" @endif><a
                                href="{{ route('xstinh.tinh', $pro->slug) }}"
                                @if (url()->full() == route('xstinh.tinh', $pro->slug)) @else class="list-group-item" @endif
                                title="{{ $pro->name }}">{{ $pro->name }}</a></li>
                    @endif
                @endforeach
            </ul>

        </div>

        <div class="content-right bullet live_mt">
            <div class="title-r"><a class="bg-blue" title="Xổ số miền trung" href="{{ route('xsmt') }}">Xổ
                    số miền trung</a></div>
            <ul>
                @foreach ($mt_province as $pro)
                    @if (strpos($pro->ngay_quay, $day) !== false)
                        <li @if (url()->full() == route('xstinh.tinh', $pro->slug)) class="active" @endif>
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{ route('xstinh.tinh', $pro->slug) }}"
                                    title="{{ $pro->name }}">{{ $pro->name }}</a>
                                <span class="hidden-mobile icon-live-done me-3" style="display: none"><i
                                        class="fas fa-check-circle text-success"></i></span>
                                <span class="hidden-mobile icon-live-wait me-3" style="display:none">
                                    <div class="live-dot dot-1"></div>
                                    <div class="live-dot dot-2"></div>
                                    <div class="live-dot dot-3"></div>
                                </span>
                            </div>
                        </li>
                    @else
                        <li @if (url()->full() == route('xstinh.tinh', $pro->slug)) class="active" @endif><a
                                href="{{ route('xstinh.tinh', $pro->slug) }}"
                                @if (url()->full() == route('xstinh.tinh', $pro->slug)) @else class="list-group-item" @endif
                                title="{{ $pro->name }}">{{ $pro->name }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="content-right bullet live_mn">
            <div class="title-r"><a class="bg-blue" title="Xổ số miền nam" href="{{ route('xsmn') }}">Xổ số
                    miền nam</a></div>
            <ul>
                @foreach ($mn_province as $pro)
                    @if (strpos($pro->ngay_quay, $day) !== false)
                        <li @if (url()->full() == route('xstinh.tinh', $pro->slug)) class="active" @endif>
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{ route('xstinh.tinh', $pro->slug) }}"
                                    title="{{ $pro->name }}">{{ $pro->name }}</a>
                                <span class="hidden-mobile icon-live-done me-3" style="display: none"><i
                                        class="fas fa-check-circle text-success"></i></span>
                                <span class="hidden-mobile icon-live-wait me-3" style="display:none">
                                    <div class="live-dot dot-1"></div>
                                    <div class="live-dot dot-2"></div>
                                    <div class="live-dot dot-3"></div>
                                </span>
                            </div>
                        </li>
                    @else
                        <li @if (url()->full() == route('xstinh.tinh', $pro->slug)) class="active" @endif><a
                                href="{{ route('xstinh.tinh', $pro->slug) }}"
                                @if (url()->full() == route('xstinh.tinh', $pro->slug)) @else class="list-group-item" @endif
                                title="{{ $pro->name }}">{{ $pro->name }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>



        <div class="content-right bullet tk-block live_vietlott">
            <div class="title-r"><a class="bg-blue" title="Xổ số vietlott" href="{{ route('vietlott') }}">Xổ số
                    vietlott</a></div>
            <ul>
                <li class="li-thantai {{ url()->full() == route('xsthantai') ? 'active' : '' }}">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('xsthantai') }}">Thần Tài</a>
                        <span class="hidden-mobile icon-live-done me-3" style="display: none"><i
                                class="fas fa-check-circle text-success"></i></span>
                        <span class="hidden-mobile icon-live-wait me-3" style="display:none">
                            <div class="live-dot dot-1"></div>
                            <div class="live-dot dot-2"></div>
                            <div class="live-dot dot-3"></div>
                        </span>
                    </div>
                </li>
                <li class="li-dientoan123 {{ url()->full() == route('dientoan123') ? 'active' : '' }}">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('dientoan123') }}">Điện toán 123</a>
                        <span class="hidden-mobile icon-live-done me-3" style="display: none"><i
                                class="fas fa-check-circle text-success"></i></span>
                        <span class="hidden-mobile icon-live-wait me-3" style="display:none">
                            <div class="live-dot dot-1"></div>
                            <div class="live-dot dot-2"></div>
                            <div class="live-dot dot-3"></div>
                        </span>
                    </div>
                </li>
                <li class="li-dientoan6x36 {{ url()->full() == route('dientoan6x36') ? 'active' : '' }}">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('dientoan6x36') }}">Điện toán 6x36</a>
                        <span class="hidden-mobile icon-live-done me-3" style="display: none"><i
                                class="fas fa-check-circle text-success"></i></span>
                        <span class="hidden-mobile icon-live-wait me-3" style="display:none">
                            <div class="live-dot dot-1"></div>
                            <div class="live-dot dot-2"></div>
                            <div class="live-dot dot-3"></div>
                        </span>
                    </div>
                </li>
                <li class="li-mega645 {{ url()->full() == route('mega645') ? 'active' : '' }}">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('mega645') }}">Mega 6/45</a>
                        <span class="hidden-mobile icon-live-done me-3" style="display: none"><i
                                class="fas fa-check-circle text-success"></i></span>
                        <span class="hidden-mobile icon-live-wait me-3" style="display:none">
                            <div class="live-dot dot-1"></div>
                            <div class="live-dot dot-2"></div>
                            <div class="live-dot dot-3"></div>
                        </span>
                    </div>
                </li>
                <li class="li-power655 {{ url()->full() == route('power655') ? 'active' : '' }}">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('power655') }}">Power 6/55</a>
                        <span class="hidden-mobile icon-live-done me-3" style="display: none"><i
                                class="fas fa-check-circle text-success"></i></span>
                        <span class="hidden-mobile icon-live-wait me-3" style="display:none">
                            <div class="live-dot dot-1"></div>
                            <div class="live-dot dot-2"></div>
                            <div class="live-dot dot-3"></div>
                        </span>
                    </div>
                </li>
            </ul>
        </div>

        <div class="content-right bullet tk-cau ">
            <div class="title-r"><a class="bg-blue" title="Dò vé số online - May mắn mỗi ngày!...">Dò vé số online -
                    May
                    mắn mỗi ngày!...</a></div>
            <div class="mx-2">
                <form action="{{ route('do-ve-so') }}" method="get">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <input style="width:100%" name="date" type="date"
                                class="form-control-sm p-0 date-do-ve date-do-ve2 mb-3 mb-md-0" id="date-right"
                                value="{{ isset($date) ? $date : date('Y-m-d') }}">
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <label class="col-3 col-form-label" for="">Tỉnh:</label>
                                <div class="col-9">
                                    <select style="width:100%" name="province"
                                        class="form-control-sm p-0 province-do-ve2 col-9" id="province"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <label class="col-3 col-form-label" for="vé số">Vé số:</label>
                                <div class="col-9">
                                    <input style="width: 100%;" name="lottery" type="text"
                                        class="form-control-sm p-0" id="number">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pb-2 text-center">
                            <button class="btn btn-primary py-0 px-1" id="btn_dove">Dò kết quả</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="content-right bullet tk-block ">
            <div class="title-r"><a class="bg-blue" title="Thống kê">Quay thử</a></div>
            <ul class="stastic-lotery">
                <li @if (url()->full() == route('quay_thu.mb')) class="active" @endif><a href="{{ route('quay_thu.mb') }}"
                        title="Quay thử miền Bắc">Quay thử miền Bắc</a></li>
                <li @if (url()->full() == route('quay_thu.mt')) class="active" @endif><a href="{{ route('quay_thu.mt') }}"
                        title="Quay thử miền Trung">Quay thử miền Trung</a>
                </li>
                <li @if (url()->full() == route('quay_thu.mn')) class="active" @endif><a href="{{ route('quay_thu.mn') }}"
                        title="Quay thử miền Nam">Quay thử miền Nam</a></li>
            </ul>
        </div>



    </div>
    <div class="col-right">

        <div class="content-right dd-xs">
            <div class="title-r"><a class="bg-blue" href="{{ route('dudoan.xsmb') }}" title="Dự đoán xổ số">Dự
                    đoán xổ số</a></div>
            <ul class="list-news">
                @foreach ($postTK as $item)
                    <?php
                    $link = str_replace('xoso.site', 'ketquaxoso247.com', $item->link);
                    
                    ?>
                    <span class="fw-bold ms-2 ">
                        <i class="fa-regular fa-hand-point-right" style="color: #d05f43;"></i>
                        @if ($item->category_id == '1')
                            <a class="text-primary fw-bold" href="{{ route('dudoan.xsmb') }}"
                                title="Dự đoán xổ số miền Bắc">Dự đoán XSMB</a>
                        @elseif ($item->category_id == '3')
                            <a class="text-primary fw-bold" href="{{ route('dudoan.xsmn') }}"
                                title="Dự đoán xổ số miền Nam">Dự đoán XSMN</a>
                        @elseif ($item->category_id == '2')
                            <a class="text-primary fw-bold" href="{{ route('dudoan.xsmt') }}"
                                title="Dự đoán xổ số miền Trung">Dự đoán XSMT</a>
                        @endif
                    </span>
                    <li class="clearfix"><a title="{{ $item->title }}" href="{{ $link }}"
                            class="fl"><img class="mag-r5 fl lazy" width="60" height="33"
                                title="{{ $item->title }}" alt="{{ $item->title }}" src="{{ $item->img }}"
                                data-src="{{ $item->img }}"></a><a href="{{ $link }}"
                            title="{{ $item->title }}">{{ $item->title }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="content-right bullet live_mb">
            <div class="title-r"><a class="bg-blue" href="{{ route('soi-cau-vip') }}" title="Soi Cầu VIP"
                    style="background: linear-gradient(to right, #dff045, #9c985a);">Soi Cầu VIP</a></div>
            <ul class="list-news">
                @foreach (App\Models\NewLoKhung::where('type', 'soi-cau-vip')->latest()->take(3)->get() as $item)
                    <li class="clearfix d-flex align-items-center">
                        <a title="{{ $item->title }}" href="{{ route('soi-cau-vip.detail', $item->slug) }}"
                            class="fl">
                            <img class="mag-r5 fl lazy img-fluid" width="60" height="33"
                                title="{{ $item->title }}" alt="{{ $item->title }}" src="{{ $item->img }}"
                                data-src="{{ $item->img }}">
                        </a>
                        <a href="{{ route('soi-cau-vip.detail', $item->slug) }}"
                            title="{{ $item->title }}">{{ $item->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="content-right bullet live_mb">
            <div class="title-r"><a class="bg-blue" href="{{ route('nuoi-lo-khung') }}" title="Nuôi lô khung"
                    style="background: linear-gradient(to right, #aaeeff, #14dbe9);">Nuôi lô khung</a></div>
            <ul class="list-news">
                @foreach (App\Models\NewLoKhung::where('type', 'nuoi-lo-khung')->latest()->take(3)->get() as $item)
                    <li class="clearfix d-flex align-items-center">
                        <a title="{{ $item->title }}" href="{{ route('nuoi-lo-khung.detail', $item->slug) }}"
                            class="fl">
                            <img class="mag-r5 fl lazy img-fluid" width="60" height="33"
                                title="{{ $item->title }}" alt="{{ $item->title }}" src="{{ $item->img }}"
                                data-src="{{ $item->img }}">
                        </a>
                        <a href="{{ route('nuoi-lo-khung.detail', $item->slug) }}"
                            title="{{ $item->title }}">{{ $item->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="content-right bullet live_mb">
            <div class="title-r"><a class="bg-blue" href="{{ route('nuoi-de-khung') }}" title="Nuôi đề khung"
                    style="background: linear-gradient(to right, #38ef7d, #04990c);">Nuôi đề khung</a></div>
            <ul class="list-news">
                @foreach (App\Models\NewLoKhung::where('type', 'nuoi-de-khung')->latest()->take(3)->get() as $item)
                    <li class="clearfix d-flex align-items-center">
                        <a title="{{ $item->title }}" href="{{ route('nuoi-de-khung.detail', $item->slug) }}"
                            class="fl">
                            <img class="mag-r5 fl lazy img-fluid" width="60" height="33"
                                title="{{ $item->title }}" alt="{{ $item->title }}" src="{{ $item->img }}"
                                data-src="{{ $item->img }}">
                        </a>
                        <a href="{{ route('nuoi-de-khung.detail', $item->slug) }}"
                            title="{{ $item->title }}">{{ $item->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>




        {{-- <div class="content-right bullet"> --}}
        {{-- <div class="title-r"><strong>Xổ Số Hôm Nay</strong></div> --}}
        {{-- <div> --}}
        {{-- <ul class="stastic-lotery two-column"> --}}
        {{-- @foreach ($xs_today_mn as $pro) --}}
        {{-- <li><a href="{{route('xstinh.tinh',$pro->slug)}}" --}}
        {{-- title="Xổ số {{$pro->name}}">Xổ số {{$pro->name}} ( 16h10 )</a> --}}
        {{-- </li> --}}
        {{-- @endforeach --}}
        {{-- @foreach ($xs_today_mt as $pro) --}}
        {{-- <li><a href="{{route('xstinh.tinh',$pro->slug)}}" --}}
        {{-- title="Xổ số {{$pro->name}}">Xổ số {{$pro->name}} ( 17h10 )</a> --}}
        {{-- </li> --}}
        {{-- @endforeach --}}
        {{-- <li><a href="{{route('xsmb')}}" title="Xổ số Miền Bắc">Xổ số Miền Bắc ( 18h10 )</a></li> --}}
        {{-- </ul> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        <div class="content-right bullet tk-cau">
            <div class="title-r"><a class="bg-blue" title="Thống kê cầu">Thống kê cầu</a></div>
            <ul class="stastic-lotery">
                <li @if (url()->full() == route('scmb.cau-bach-thu')) class="active" @endif><a
                        href="{{ route('scmb.cau-bach-thu') }}" title="Cầu bạch thủ">Cầu bạch thủ</a></li>
                {{-- <li @if (url()->full() == route('scmb.cau-db')) class="active" @endif><a href="#" title="Cầu lô tô đặc biệt">Cầu lô tô đặc biệt</a> --}}
                {{-- </li> --}}
                <li @if (url()->full() == route('scmb.cau-truot')) class="active" @endif><a href="{{ route('scmb.cau-truot') }}"
                        title="Cầu lô tô trượt">Cầu lô tô trượt</a></li>
                <li @if (url()->full() == route('scmb.cau-loto-2nhay')) class="active" @endif><a
                        href="{{ route('scmb.cau-loto-2nhay') }}" title="Cầu lô tô 2 nháy">Cầu lô tô 2 nháy</a>
                </li>
                <li @if (url()->full() == route('scmb.cau-thu')) class="active" @endif><a href="{{ route('scmb.cau-thu') }}"
                        title="Cầu lô tô theo thứ">Cầu lô tô theo thứ</a>
                </li>
            </ul>
        </div>

        <div class="content-right bullet live_mb">
            <div class="title-r"><a class="bg-blue" title="Thống kê">Thống kê</a></div>
            <ul class="stastic-lotery">
                {{-- <li @if (url()->full() == route('tk.dac-biet', 'mb')) class="active" @endif><a href="#" title="2 số cuối giải đặc biệt">2 số cuối giải đặc biệt</a> --}}
                {{-- </li> --}}
                {{-- <li @if (url()->full() == route('tk.tan-suat-lo-to', 'mb')) class="active" @endif><a href="#" title="Tần suất loto">Tần suất loto</a></li> --}}
                <li @if (url()->full() == route('tk.dac-biet-tuan')) class="active" @endif><a
                        href="{{ route('tk.dac-biet-tuan') }}" title="Bảng đặc biệt tuần">Bảng đặc biệt tuần</a></li>
                <li @if (url()->full() == route('tk.dac-biet-thang')) class="active" @endif><a
                        href="{{ route('tk.dac-biet-thang') }}" title="Bảng đặc biệt tháng">Bảng đặc biệt tháng</a>
                </li>
                <li @if (url()->full() == route('tk.dac-biet-nam')) class="active" @endif><a href="{{ route('tk.dac-biet-nam') }}"
                        title="Bảng đặc biệt năm">Bảng đặc biệt năm</a></li>
                <li @if (url()->full() == route('tk.thong-ke-nhanh')) class="active" @endif><a
                        href="{{ route('tk.thong-ke-nhanh') }}" title="Thống kê nhanh">Thống kê nhanh</a></li>
                <li @if (url()->full() == route('tk.dau-duoi-loto', 'mb')) class="active" @endif><a
                        href="{{ route('tk.dau-duoi-loto', 'mb') }}" title="Đầu đuôi loto">Đầu đuôi loto</a></li>
                <li @if (url()->full() == route('tk.lo-gan', 'mb')) class="active" @endif><a href="{{ route('tk.lo-gan', 'mb') }}"
                        title="lô gan miền Bắc">Lô gan miền Bắc</a></li>
                <li @if (url()->full() == route('tk.lo-gan-mt')) class="active" @endif><a href="{{ route('tk.lo-gan-mt') }}"
                        title="lô gan miền Trung">Lô gan miền Trung</a></li>
                <li @if (url()->full() == route('tk.lo-gan-mn')) class="active" @endif><a href="{{ route('tk.lo-gan-mn') }}"
                        title="lô gan miền Nam">Lô gan miền Nam</a></li>
            </ul>
        </div>
    </div>
</section>
