<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\Models\Lottery;
use App\Models\Province;
use App\Models\Gan;
use App\Models\Post;
use DB;

class CreateDuDoanXoSo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CreateDuDoanXoSo:everyMinute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('Bắt đầu tạo bài viết dự đoán ngày'.date('d/m/Y',strtotime("+1 days")));

        set_time_limit(0);
        $this->create_DuDoanXSMNTheoNgay_Content();
        $this->create_DuDoanXSMTTheoNgay_Content();
        $this->create_DuDoanXSMBTheoNgay_Content();

        Log::info('Tạo xong bài viết dự đoán ngày'.date('d/m/Y',strtotime("+1 days")));
    }

    public function create_DuDoanXSMBTheoNgay_Content()
    {
        $date = date('d/m/Y', strtotime("+1 days")); // ngày cầu, tạo lúc 1h sáng
        $dateYmd = getNgaycheo($date);
        $dateDMY = str_replace('/','-',$date);

        $check = Post::where('category_id', 1)->where('date', $dateYmd)->get();
        if (count($check) > 0) {
            return;
        }

        // kỳ quay trước
        $xsmb = Lottery::where('mien', 1)->where('date', '<', $dateYmd)->where('status', 1)->orderBy('date', 'DESC')->first();
        $pascal[] = $xsmb->gdb . $xsmb->g1;
        for($k=1;$k<=8;$k++){
            $pascal[$k] = '';
            for ($i = 0; $i < strlen($pascal[$k-1]) - 1; $i++) {
                $pascal[$k] .=$this->TongPascal($pascal[$k-1][$i],$pascal[$k-1][$i+1]);
            }
        }

        // thống kế số lần về trong 30 ngày
        $kqs = Lottery::where('mien', 1)->where('status', 1)->where('date', '<', $dateYmd)->orderBy('date', 'DESC')->take(30)->get();
        $tk_arr = $this->getTKLoto($kqs);
        $tkGan = $tk_arr['gan'];
        $tkLoto = $tk_arr['tan_suat'];

        $content =  view('frontend.dudoanxoso.du-doan-xsmb-theo-ngay-content', compact('date', 'dateYmd', 'xsmb','pascal','kqs','tkLoto','tkGan'));

        $des = "Dự đoán XSMB $date - Soi cầu dự đoán xổ số miền Bắc ngày $dateDMY do cao thủ chốt số đưa ra siêu chuẩn, miễn phí. Dự đoán lô tô, giải đặc biệt MB ngày $date";
        $title = "Phân tích dự đoán Xổ Số Miền Bắc ngày $date - Dự đoán XSMB $dateDMY";
        Post::firstOrCreate([
            'link' => route('dudoan.xsmb.date', getNgayLink($dateYmd)),
            'img' => '/frontend/img/thong-ke-xsmb-'.rand(1,20).'.png',
            'title' => $title,
            'des' => $des,
            'content' => $content,
            'date' => $dateYmd,
            'category_id' => 1 // miền bắc
        ]);
    }

    public function create_DuDoanXSMNTheoNgay_Content()
    {
        $date = date('d/m/Y', strtotime("+1 days")); // ngày cầu, tạo lúc 1h sáng
        $dateYmd = getNgaycheo($date);
        $dateDMY = str_replace('/','-',$date);

        $check = Post::where('category_id', 3)->where('date', $dateYmd)->get();
        if (count($check) > 0) {
            return;
        }

        $day = getThuNumber($dateYmd);
        $province_mn = Province::where('mien', 3)->where('ngay_quay', 'like', '%' . $day . '%')->get();
        $xsmns = Lottery::where('mien', 3)->where('date', date('Y-m-d', strtotime(getNgayLink($dateYmd) . ' -1 days')))->get();

        foreach ($province_mn as $pro) {
            $kqs = Lottery::where('province_id', $pro->id)->where('status', 1)->where('date', '<', $dateYmd)->orderBy('date', 'DESC')->take(30)->get();

            $tk_arr = $this->getTKLoto($kqs);
            $tkGan[$pro->short_name] = $tk_arr['gan'];
            $tkLoto[$pro->short_name] = $tk_arr['tan_suat'];


            $xsmnTinh = Lottery::where('province_id', $pro->id)->where('status', 1)->orderBy('date', 'DESC')->first();
            $pascal[$pro->short_name]['gdb'] = $xsmnTinh->gdb;
            $pascal[$pro->short_name]['g1'] = $xsmnTinh->g1;
            $pascal[$pro->short_name][] = $xsmnTinh->gdb . $xsmnTinh->g1;
            for($k=1;$k<=9;$k++){
                $pascal[$pro->short_name][$k] = '';
                for ($i = 0; $i < strlen($pascal[$pro->short_name][$k-1]) - 1; $i++) {
                    $pascal[$pro->short_name][$k] .=$this->TongPascal($pascal[$pro->short_name][$k-1][$i],$pascal[$pro->short_name][$k-1][$i+1]);
                }
            }

            $pro_custom = $pro;
            $content = view('frontend.dudoanxoso.du-doan-xsmn-theo-ngay-content',compact('date', 'dateYmd', 'xsmns','pascal','kqs','tkLoto','tkGan','pro_custom'))->render();

            $des = "Dự đoán XSMN $date - Soi cầu dự đoán xổ số $pro_custom->name miền Nam ngày $dateDMY do cao thủ chốt số đưa ra siêu chuẩn, miễn phí. Dự đoán lô tô, giải đặc biệt MN ngày $date";
            $title = "Phân tích dự đoán Xổ Số $pro_custom->name Miền Nam ngày $date - Dự đoán XSMN $dateDMY";
            Post::firstOrCreate([
                'link' => route('dudoan.xsmn.date', getNgayLink($dateYmd)),
                'img' => '/frontend/img/thong-ke-xsmn-'.rand(1,20).'.png',
                'title' => $title,
                'des' => $des,
                'content' => $content,
                'date' => $dateYmd,
                'category_id' => 3,
                'province_id' => $pro_custom->id // đề
            ]);
        }

        $content = view('frontend.dudoanxoso.du-doan-xsmn-theo-ngay-content',compact('date', 'dateYmd', 'xsmns','pascal','kqs','tkLoto','tkGan','province_mn'))->render();

        $des = "Dự đoán XSMN $date - Soi cầu dự đoán xổ số miền Nam ngày $dateDMY do cao thủ chốt số đưa ra siêu chuẩn, miễn phí. Dự đoán lô tô, giải đặc biệt MN ngày $date";
        $title = "Phân tích dự đoán Xổ Số Miền Nam ngày $date - Dự đoán XSMN $dateDMY";
        Post::firstOrCreate([
            'link' => route('dudoan.xsmn.date', getNgayLink($dateYmd)),
            'img' => '/frontend/img/thong-ke-xsmn-'.rand(1,20).'.png',
            'title' => $title,
            'des' => $des,
            'content' => $content,
            'date' => $dateYmd,
            'category_id' => 3 // đề
        ]);

    }

    public function create_DuDoanXSMTTheoNgay_Content()
    {
        $date = date('d/m/Y', strtotime("+1 days")); // ngày cầu, tạo lúc 1h sáng
        $dateYmd = getNgaycheo($date);
        $dateDMY = str_replace('/','-',$date);

        $check = Post::where('category_id', 2)->where('date', $dateYmd)->get();
        if (count($check) > 0) {
            return;
        }

        $day = getThuNumber($dateYmd);
        $province_mt = Province::where('mien', 2)->where('ngay_quay', 'like', '%' . $day . '%')->get();
        $xsmts = Lottery::where('mien', 2)->where('date', date('Y-m-d', strtotime(getNgayLink($dateYmd) . ' -1 days')))->get();

        foreach ($province_mt as $pro) {
            $kqs = Lottery::where('province_id', $pro->id)->where('status', 1)->where('date', '<', $dateYmd)->orderBy('date', 'DESC')->take(30)->get();

            $tk_arr = $this->getTKLoto($kqs);
            $tkGan[$pro->short_name] = $tk_arr['gan'];
            $tkLoto[$pro->short_name] = $tk_arr['tan_suat'];


            $xsmtTinh = Lottery::where('province_id', $pro->id)->where('status', 1)->orderBy('date', 'DESC')->first();
            $pascal[$pro->short_name]['gdb'] = $xsmtTinh->gdb;
            $pascal[$pro->short_name]['g1'] = $xsmtTinh->g1;
            $pascal[$pro->short_name][] = $xsmtTinh->gdb . $xsmtTinh->g1;
            for($k=1;$k<=9;$k++){
                $pascal[$pro->short_name][$k] = '';
                for ($i = 0; $i < strlen($pascal[$pro->short_name][$k-1]) - 1; $i++) {
                    $pascal[$pro->short_name][$k] .=$this->TongPascal($pascal[$pro->short_name][$k-1][$i],$pascal[$pro->short_name][$k-1][$i+1]);
                }
            }

           
            $pro_custom = $pro;
            $content = view('frontend.dudoanxoso.du-doan-xsmt-theo-ngay-content',compact('date', 'dateYmd', 'xsmts','pascal','kqs','tkLoto','tkGan','pro_custom'))->render();

            $des = "Dự đoán XSMT $date - Soi cầu dự đoán xổ số $pro_custom->name miền Trung ngày $dateDMY do cao thủ chốt số đưa ra siêu chuẩn, miễn phí. Dự đoán lô tô, giải đặc biệt MT ngày $date";
            $title = "Phân tích dự đoán Xổ Số $pro_custom->name Miền Trung ngày $date - Dự đoán XSMT $dateDMY";
            Post::firstOrCreate([
                'link' => route('dudoan.xsmt.date', getNgayLink($dateYmd)),
                'img' => '/frontend/img/thong-ke-xsmt-'.rand(1,20).'.png',
                'title' => $title,
                'des' => $des,
                'content' => $content,
                'date' => $dateYmd,
                'category_id' => 2,
                'province_id' => $pro_custom->id
            ]);
        }

        $content = view('frontend.dudoanxoso.du-doan-xsmt-theo-ngay-content',compact('date', 'dateYmd', 'xsmts','pascal','kqs','tkLoto','tkGan','province_mt'))->render();

        $des = "Dự đoán XSMT $date - Soi cầu dự đoán xổ số miền Trung ngày $dateDMY do cao thủ chốt số đưa ra siêu chuẩn, miễn phí. Dự đoán lô tô, giải đặc biệt MT ngày $date";
        $title = "Phân tích dự đoán Xổ Số Miền Trung ngày $date - Dự đoán XSMT $dateDMY";
        Post::firstOrCreate([
            'link' => route('dudoan.xsmt.date', getNgayLink($dateYmd)),
            'img' => '/frontend/img/thong-ke-xsmt-'.rand(1,20).'.png',
            'title' => $title,
            'des' => $des,
            'content' => $content,
            'date' => $dateYmd,
            'category_id' => 2 // đề
        ]);

    }

    public function getTKLoto($kqs, $type = 1)
    {
        // tạo mảng bộ số từ 00->99
        $ArrayCollect = array();
        $ArrayCollect_Gan = array();
        for ($i = 0; $i < 100; $i++) {
            if ($i < 10) {
                $ArrayCollect_Gan[$i][0] = '0' . $i;
                $ArrayCollect[$i][0] = '0' . $i;
            } else {
                $ArrayCollect_Gan[$i][0] = $i;
                $ArrayCollect[$i][0] = $i;
            }
            $ArrayCollect_Gan[$i][1] = ''; // ngày về gần nhất
            $ArrayCollect_Gan[$i][2] = -1; // số ngày chưa về

            $ArrayCollect[$i][1] = 0; // Tổng số lần xuất hiện

        }
        $number_date = 0;

        foreach ($kqs as $kq) {
            if ($type == 1) {
                $tmp_result = $kq->gdb . '-' . $kq->g1 . '-' . $kq->g2 . '-' . $kq->g3 . '-' . $kq->g4 . '-' . $kq->g5 . '-' . $kq->g6 . '-' . $kq->g7 . '-' . $kq->g8;
            } else {
                $tmp_result = $kq->gdb;
            }
            $arr_kq = getLoto($tmp_result);
            for ($t = 0; $t < 100; $t++) {
                if (in_array($ArrayCollect_Gan[$t][0], $arr_kq)) {
                    if ($ArrayCollect_Gan[$t][2] == -1) {
                        $ArrayCollect_Gan[$t][1] = getNgay($kq->date);
                        /*Tinh so ngay chua ve*/
                        $ArrayCollect_Gan[$t][2] = $number_date;
                    }
                }
                // đếm tổng số lần xuất hiện
                $ArrayCollect[$t][1] += solan_xuathien_trongngay($ArrayCollect[$t][0], $arr_kq);

            }
            $number_date++;
        }

        for ($e = 0; $e < 99; $e++) {
            for ($f = $e + 1; $f < 100; $f++) {
                if ($ArrayCollect_Gan[$e][2] < $ArrayCollect_Gan[$f][2]) {
                    swap($ArrayCollect_Gan[$e][2], $ArrayCollect_Gan[$f][2]);
                    swap($ArrayCollect_Gan[$e][0], $ArrayCollect_Gan[$f][0]);
                    swap($ArrayCollect_Gan[$e][1], $ArrayCollect_Gan[$f][1]);
                }
            }
        }
        // thống kê tần suất
        for ($e = 0; $e < 99; $e++) {
            for ($f = $e + 1; $f < 100; $f++) {
                if ($ArrayCollect[$e][1] < $ArrayCollect[$f][1]) {
                    swap($ArrayCollect[$e][0], $ArrayCollect[$f][0]);
                    swap($ArrayCollect[$e][1], $ArrayCollect[$f][1]);
                }
            }
        }

        return [
            'gan' => $ArrayCollect_Gan,
            'tan_suat' => $ArrayCollect
        ];
    }

    function TongPascal($a, $b)
    {
        $kq = $a + $b;
        if ($kq >= 10) return substr($kq, 1, 1);
        else return $kq;
    }

    /**
     * Đây là hàm chính sẽ chạy khi cron job được thực thi
     * Chúng ta sẽ viết lời gọi tới command xử lý nghiệp vụ,
     * cụ thể trong ví dụ này là App\Console\Commands\GetManga
     * @return mixed
     */
    public function fire()
    {
        //Khai báo đường dẫn tới command class
        Bus::dispatchFromArray('App\Console\Commands\CreateDuDoanXoSo', []);
    }
}
