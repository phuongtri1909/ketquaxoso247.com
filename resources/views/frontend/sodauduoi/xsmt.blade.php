<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
@extends('frontend.layouts.app')
@section('title','Sớ đầu đuôi mt - Sớ đầu đuôi miền Trung Với xổ sổ trực tiếp')
@section('decription','Sớ đầu đuôi MT Với xổ sổ trực tiếp - Sớ đầu đuôi Miền Trung: Xem đầu đít MT ở giải đặc biệt và giải 8 ở 2 số cuối chính xác và hoàn toàn miễn phí')
@section('keyword','Dự đoán số đầu đuôi miềm trung,số đầu đuôi miền trung, XSĐĐMT')
@section('h1','Sớ đầu đuôi mt - Sớ đầu đuôi miền Trung Với xổ sổ trực tiếp ')
@section('breadcrumb')
    <div class="linkway">
        <div class="main">
            <div class="breadcrumb">
                <ol itemscope="" itemtype="https://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a
                                itemprop="item" href="/" title="Trang chủ"><span itemprop="name">Trang chủ</span>
                            <meta itemprop="position" content="1">
                        </a></li>
                    <li> »
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a
                                itemprop="item" href="{{url()->current()}}"
                                title="Sớ đầu đuôi miền Trung" class="last"><span
                                    itemprop="name">Sớ đầu đuôi miền Trung</span>
                            <meta itemprop="position" content="2">
                        </a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-l">
        <div class="box">
            <h2 class="tit-mien magb10">Sớ đầu đuôi miền Trung</h2>


            <table class="l2d-table lotteryMnResult">
                <tbody id="article-list">
                @foreach($kqxsmts as $xsmts)
                    @php
                    $xsmtTinh = $xsmts[0];
                    $count = count($xsmts);

                    if($count==3){
                    $div_class = 'three-city';
                    $table_class = 'colthreecity';
                    }elseif($count==4){
                    $div_class = 'four-city';
                    $table_class = 'colfourcity';
                    }elseif($count==2){
                    $div_class = 'two-city';
                    $table_class = 'coltwocity';
                    }
                    @endphp

                <tr>

                    <td class="date">
                        {{getThu($xsmtTinh->day)}}           <br>
                        {{getNgay($xsmtTinh->date)}}        </td>
                    @foreach ($xsmts as $xsmt)
                    <td>
                        {{$xsmt->province->name}}                <br>
                        <b>{{$xsmt->g8}}</b>−<b class="red">{{substr($xsmt->gdb,-2)}}</b>
                    </td>
                    @endforeach
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        {{--<div class="lotteryMnResult" id="result-more"></div>--}}

        <input type="hidden" value="20" id="skip">

        <input type="hidden" value="{{$lastPage*20}}" id="last_page">

        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <div class="loadmoreimg"><i class="fas fa-spinner fa-spin"></i></div>
        <button class="btn-see-more magb10 btn-viewmore" id="xem_them" value="Xem thêm" data-page="2" data-province="mt">Xem
            thêm
        </button>
        
          <div class="box-content">
          <p><span style="font-weight: 400;"><a title="Sớ Đầu Đu&ocirc;i Miền Trung" href="/so-dau-duoi-xsmn"><strong>Sớ Đầu Đu&ocirc;i Miền Trung</strong></a>. Xem Sớ Đầu Đu&ocirc;i Miền Trung chuẩn nhất tại <a title="xosotructiep.online" href="/">xosotructiep.online</a></span></p>
            <p><span style="font-weight: 400;">xosotructiep.online nơi cập nhật Sớ Đầu Đu&ocirc;i Miền Trung ch&iacute;nh x&aacute;c v&agrave; nhanh ch&oacute;ng nhất.</span></p>
            <p><strong>Sớ Đầu Đu&ocirc;i Miền Trung l&agrave; g&igrave;?</strong></p>
            <p><span style="font-weight: 400;">Sớ đầu đu&ocirc;i miền Trung l&agrave; phương ph&aacute;p thống k&ecirc; nhanh 2 con loto đầu ở giải 8 v&agrave; 2 con loto cuối ở giải Đặc Biệt. Sớ đầu đu&ocirc;i miền Trung gi&uacute;p bạn thống k&ecirc; được những con loto n&agrave;o hay về, &iacute;t về hay l&acirc;u chưa về ở giải đầu v&agrave; giải cuối của XSMB.</span></p>
            <p><span style="font-weight: 400;">C&oacute; thể xem sớ đầu đu&ocirc;i miền Trung của tất cả c&aacute;c ng&agrave;y li&ecirc;n tục hoặc xem theo thứ trong tuần. Bảng thống k&ecirc; sớ đầu đu&ocirc;i miền Trung hiển thị kết quả của 100 lần quay thưởng gần nhất.&nbsp;</span></p>
            <p><span style="font-weight: 400;">Một số lợi &iacute;ch m&agrave; bạn c&oacute; thể xem sớ đầu đu&ocirc;i Miền Trung:</span></p>
            <p><span style="font-weight: 400;">+ Tiết kiệm thời gian</span></p>
            <p><span style="font-weight: 400;">+ Thống k&ecirc; ch&iacute;nh x&aacute;c v&agrave; nhanh ch&oacute;ng mỗi ng&agrave;y từ trường quay.</span></p>
            <p><strong>C&aacute;ch chơi loto theo sớ đầu đu&ocirc;i Miền Trung</strong></p>
            <p><span style="font-weight: 400;">Sau khi đ&atilde; Trung được th&ocirc;ng tin tổng quan về sớ đầu đu&ocirc;i Miền Trung l&agrave; g&igrave;, chắc chắn c&aacute;c bạn sẽ muốn Trung được c&aacute;ch soi cầu l&ocirc; đầu đu&ocirc;i ch&iacute;nh x&aacute;c. Nếu người chơi c&ograve;n đang ph&acirc;n v&acirc;n về c&acirc;u hỏi n&agrave;y th&igrave; tham khảo ngay những th&ocirc;ng tin hữu &iacute;ch sau:</span></p>
            <p><strong>Đặt cược theo đầu</strong></p>
            <p><span style="font-weight: 400;">H&igrave;nh thức n&agrave;y sẽ được t&iacute;nh cụ thể như v&iacute; dụ sau. V&iacute; dụ 49 h&ocirc;m nay người chơi c&oacute; 4 đầu khi gh&eacute;p với c&aacute;c số từ 0 đến 9 l&agrave; đu&ocirc;i c&oacute; thể tạo th&agrave;nh 10 cặp số kh&aacute;c nhau. Với bộ số n&agrave;y anh em chơi l&ocirc; xi&ecirc;n th&igrave; lợi nhuận mang về sẽ cao hơn người chọn.</span></p>
            <p><strong>Đặt cược theo đu&ocirc;i</strong></p>
            <p><span style="font-weight: 400;">Ngược với phương ph&aacute;p tr&ecirc;n, việc gh&eacute;p đu&ocirc;i được thực hiện như sau. Khi soi cầu giải đặc biệt 73, ch&uacute;ng t&ocirc;i lấy 3 đu&ocirc;i để gh&eacute;p với c&aacute;c số từ 0 đến 9. D&atilde;y số n&agrave;y th&iacute;ch hợp cho những loại xổ số c&oacute; tỷ lệ tr&uacute;ng thưởng cao.</span></p>
            <p><strong>Gh&eacute;p với giải 5</strong></p>
            <p><span style="font-weight: 400;">Đ&acirc;y l&agrave; c&aacute;ch soi cầu về đầu số được nhiều người chơi l&acirc;u Trung sử dụng. V&igrave; vậy, việc gh&eacute;p nối n&agrave;y rất đơn giản, v&igrave; vậy những người chơi mới cũng c&oacute; thể được &aacute;p dụng. Bạn cần l&agrave;m theo c&aacute;c bước sau: nếu GĐB về 99, giải 5 về 73. Tại thời điểm n&agrave;y, những số bạn đ&atilde; thực hiện bao gồm: 97 &ndash; 93. Với c&aacute;ch n&agrave;y, người chơi c&oacute; ngay 2 cặp số đẹp để chốt số mở thưởng h&agrave;ng ng&agrave;y. V&agrave; tất nhi&ecirc;n, phương ph&aacute;p n&agrave;y cũng c&oacute; tỷ lệ thắng rất cao.</span></p>
            <p><strong>Gh&eacute;p với&nbsp; giải 6</strong></p>
            <p><span style="font-weight: 400;">Một c&aacute;ch kh&aacute;c để dễ d&agrave;ng t&igrave;m kiếm con số n&agrave;y dựa tr&ecirc;n những g&igrave; ch&uacute;ng t&ocirc;i đ&atilde; chia sẻ l&agrave; gh&eacute;p n&oacute; với giải s&aacute;u, thường sẽ c&oacute; nhiều số hơn. Bạn c&oacute; thể gh&eacute;p với c&aacute;c cặp số như sau: 86 &ndash; 87 &ndash; 29 &ndash; 25. Tuy nhi&ecirc;n, để c&oacute; thể đạt hiệu quả tối đa, bạn n&ecirc;n xen kẽ phương ph&aacute;p n&agrave;y để tỷ lệ thắng cao.&nbsp;</span></p>
            <p><strong>Gh&eacute;p với giải 7</strong></p>
            <p><span style="font-weight: 400;">Khi &aacute;p dụng phương ph&aacute;p đu&ocirc;i giải 7, bạn thường sẽ c&oacute; &iacute;t cặp số hơn. V&iacute; dụ, 56, 7 tương ứng với 22-68 v&agrave; 59. Tại đ&acirc;y, người chơi sẽ c&oacute; con l&ocirc; như sau: 52-56-69. Như vậy khi gh&eacute;p đu&ocirc;i GĐB với đầu giải bảy, đầu giải nhất. C&aacute;c GĐB kết th&uacute;c bằng số 7. Người chơi sẽ c&oacute; những cặp số rất đẹp may mắn để đặt cược.</span></p>
            <p><span style="font-weight: 400;">Xem Sớ Đầu Đu&ocirc;i, Sớ Đầu Đu&ocirc;i Miền Trung, Sớ Đầu Đu&ocirc;i Miền Nam, Sớ Đầu Đu&ocirc;i Miền Bắc được cập nhật li&ecirc;n tục, ch&iacute;nh x&aacute;c tại xosotructiep.online</span></p>
           
        </div>

    </div>
@endsection

@section('afterJS')
    <script>

        $(document).ready(function () {

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $('#xem_them').click(function (event) {

                event.preventDefault();

                var skip = parseInt($('#skip').val());

                var last_page = parseInt($('#last_page').val());

                if (skip <= last_page) {

                    $('.loadmoreimg').css('display', 'block');

                    $('.btn-viewmore').css('display', 'none');

                    $.post("{{route('sodauduoi.xsmt.xem_them.post')}}", {

                        skip: skip,

                        _token: CSRF_TOKEN

                    }, function (result) {

                        var data = $.parseJSON(result);

                        $(".lotteryMnResult").append(data.template);


                        // cập nhật các tham số

                        $('.loadmoreimg').css('display', 'none');

                        $('.btn-viewmore').css('display', 'block');

                        $('#skip').val(skip + 20);

                        if (skip == last_page) {

                            $("#xem_them").hide();

                        }
                    });

                }

            });

        });
    </script>
@endsection