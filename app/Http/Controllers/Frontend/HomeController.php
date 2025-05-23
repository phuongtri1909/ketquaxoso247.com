<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lottery;
use App\Models\Max3D;
use App\Models\Max3DPro;
use App\Models\Power655;
use App\Models\Mega645;
use App\Models\SoiCauVipKhung;
use App\Models\Province;
use App\Models\Gan;
use App\Models\Post;
use Cache;

class HomeController extends Controller
{

    public function index()
    {
        // xổ số miền bắc
        $xsmb = Lottery::where('mien', 1)->orderBy('date', 'DESC')->first();

        // xổ số miền trung
        $xsmt = Lottery::where('mien', 2)->orderBy('date', 'DESC')->first();
        $xsmts = Lottery::where('mien', 2)->where('date', $xsmt->date)->get();

        // xổ số miền name
        $xsmn = Lottery::where('mien', 3)->orderBy('date', 'DESC')->first();
        $xsmns = Lottery::where('mien', 3)->where('date', $xsmn->date)->get();


        //        $kqs = Lottery::where('mien', 1)->where('status', 1)->orderBy('date', 'DESC')->take(40)->get();
        //
        //        $tkLoto = $this->getTKLoto($kqs);
        //        $loDauDuoi = $this->getTKLoDauDuoi($kqs);
        //        $loRoi = $this->getTKLoRoi($kqs);

        $kq_power655 = Power655::orderBy('date', 'DESC')->first();
        $kq_mega645 = Mega645::orderBy('date', 'DESC')->first();
        $kq_max3d = Max3D::orderBy('date', 'DESC')->first();
        $kq_max3d_pro = Max3DPro::orderBy('date', 'DESC')->first();


        $day = getThuNumber(date('Y-m-d', time()));
        $xs_today_mt = Province::where('mien', 2)->where('ngay_quay', 'like', '%' . $day . '%')->get();
        $xs_today_mn = Province::where('mien', 3)->where('ngay_quay', 'like', '%' . $day . '%')->get();
        $xs_today_mb = Province::where('mien', 1)->where('ngay_quay', 'like', '%' . $day . '%')->get();

        // lấy số hàng in các tỉnh và vietlott

        $countRow = count($xs_today_mb);

        // Số hàng cơ bản cho Vietlott (Thần Tài và Điện toán 123 - hiển thị hàng ngày - 1 tỉnh mien Bắc)
        $countRowVietlott = 3;

        $dateW636 = [3, 6]; // Thứ 4 và thứ 7
        $dateW645 = [0, 3, 5]; // Chủ nhật, thứ 4, và thứ 6
        $dateW655 = [2, 4, 6]; // Thứ 3, thứ 5, và thứ 7

        $currentDayOfWeek = (int)date('w'); // Lấy thứ hiện tại (0: CN, 1-6: T2-T7)

        // Kiểm tra thứ hiện tại có xổ Điện toán 6x36 không
        if (in_array($currentDayOfWeek, $dateW636)) {
            $countRowVietlott++;
        }

        // Kiểm tra thứ hiện tại có xổ Mega 6/45 không
        if (in_array($currentDayOfWeek, $dateW645)) {
            $countRowVietlott++;
        }

        // Kiểm tra thứ hiện tại có xổ Power 6/55 không
        if (in_array($currentDayOfWeek, $dateW655)) {
            $countRowVietlott++;
        }

        // Lấy số hàng lớn nhất giữa số hàng tỉnh miền Bắc và số hàng Vietlott
        $maxRows = max($countRow, $countRowVietlott);

        // Truyền biến $maxRows vào view để sử dụng trong blade template
        return view('frontend.home.home', compact('xsmb', 'xsmts', 'xsmns', 'kq_power655', 'kq_mega645', 'kq_max3d', 'kq_max3d_pro', 'xs_today_mt', 'xs_today_mn', 'xs_today_mb', 'maxRows', 'countRowVietlott'));
    }


    public function getTKLoto($kqs)
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
            $tmp_result = $kq->gdb . '-' . $kq->g1 . '-' . $kq->g2 . '-' . $kq->g3 . '-' . $kq->g4 . '-' . $kq->g5 . '-' . $kq->g6 . '-' . $kq->g7 . '-' . $kq->g8;
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

    public function getTKLoDauDuoi($kqs)
    {
        $ArrayCollect_Dau = array();
        $ArrayCollect_Duoi = array();
        for ($t = 0; $t < 10; $t++) {
            $ArrayCollect_Dau[$t][0] = $t;
            $ArrayCollect_Dau[$t][1] = 0;

            $ArrayCollect_Duoi[$t][0] = $t;
            $ArrayCollect_Duoi[$t][1] = 0;
        }
        foreach ($kqs as $kq) {
            $tmp_result1 = $kq->gdb . '-' . $kq->g1 . '-' . $kq->g2 . '-' . $kq->g3 . '-' . $kq->g4 . '-' . $kq->g5 . '-' . $kq->g6 . '-' . $kq->g7 . '-' . $kq->g8;
            $arr_kq = getLoto($tmp_result1);

            for ($t = 0; $t < 10; $t++) {
                foreach ($arr_kq as $loto) {
                    if ($t == substr($loto, 0, 1)) {
                        $ArrayCollect_Dau[$t][1] = $ArrayCollect_Dau[$t][1] + 1;
                    }
                    if ($t == substr($loto, 1, 1)) {
                        $ArrayCollect_Duoi[$t][1] = $ArrayCollect_Duoi[$t][1] + 1;
                    }
                }
            }
        }

        //        for ($e = 0; $e < 9; $e++) {
        //            for ($f = $e + 1; $f < 10; $f++) {
        //                if ($ArrayCollect_Dau[$e][1] < $ArrayCollect_Dau[$f][1]) {
        //                    swap($ArrayCollect_Dau[$e][0], $ArrayCollect_Dau[$f][0]);
        //                    swap($ArrayCollect_Dau[$e][1], $ArrayCollect_Dau[$f][1]);
        //                }
        //            }
        //        }
        //        for ($e = 0; $e < 9; $e++) {
        //            for ($f = $e + 1; $f < 10; $f++) {
        //                if ($ArrayCollect_Duoi[$e][1] < $ArrayCollect_Duoi[$f][1]) {
        //                    swap($ArrayCollect_Duoi[$e][0], $ArrayCollect_Duoi[$f][0]);
        //                    swap($ArrayCollect_Duoi[$e][1], $ArrayCollect_Duoi[$f][1]);
        //                }
        //            }
        //        }

        return [
            'dau' => $ArrayCollect_Dau,
            'duoi' => $ArrayCollect_Duoi
        ];
    }

    public function getTKLoRoi($kqs)
    {
        // tạo mảng bộ số
        $arr_vitri = ['ĐB', '1', '2_1', '2_2', '3_1', '3_2', '3_3', '3_4', '3_5', '3_6', '4_1', '4_2', '4_3', '4_4', '5_1', '5_2', '5_3', '5_4', '5_5', '5_6', '6_1', '6_2', '6_3', '7_1', '7_2', '7_3', '7_4'];

        $ArrayCollect_Roi = array();
        for ($i = 0; $i < 27; $i++) {
            $ArrayCollect_Roi[$i][0] = $arr_vitri[$i]; // vị trí
            $ArrayCollect_Roi[$i][1] = ''; // ngày về gần nhất
            $ArrayCollect_Roi[$i][2] = -1; // số ngày chưa về
            $ArrayCollect_Roi[$i][3] = $i; // lô rơi hôm nay
        }
        // lô Rơi
        $arr_kq = array();
        $arr_date = array();
        foreach ($kqs as $kq) {
            $tmp_result = $kq->gdb . '-' . $kq->g1 . '-' . $kq->g2 . '-' . $kq->g3 . '-' . $kq->g4 . '-' . $kq->g5 . '-' . $kq->g6 . '-' . $kq->g7 . '-' . $kq->g8;
            $arr_kq[] = getLoto($tmp_result);
            $arr_date[] = $kq->date;
        }

        $len_collect = count($ArrayCollect_Roi);
        $number_date = 0;

        for ($i = 0; $i <= count($arr_kq) - 2; $i++) {
            for ($t = 0; $t < $len_collect; $t++) {
                $arr_kq_roi = $arr_kq[$i + 1];
                $arr_kq_hom_sau = $arr_kq[$i];
                if (in_array($arr_kq_roi[$t], $arr_kq_hom_sau)) {
                    if ($ArrayCollect_Roi[$t][2] == -1) {
                        $ArrayCollect_Roi[$t][1] = getNgay($arr_date[$i]);
                        /*Tinh so ngay chua ve*/
                        $ArrayCollect_Roi[$t][2] = $number_date;
                    }
                }
            }
            $number_date++;
        }
        for ($t = 0; $t < $len_collect; $t++) {
            $ArrayCollect_Roi[$t][3] = $arr_kq[0][$ArrayCollect_Roi[$t][3]];
        }


        for ($e = 0; $e < $len_collect - 1; $e++) {
            for ($f = $e + 1; $f < $len_collect; $f++) {
                if ($ArrayCollect_Roi[$e][2] < $ArrayCollect_Roi[$f][2]) {
                    swap($ArrayCollect_Roi[$e][2], $ArrayCollect_Roi[$f][2]);
                    swap($ArrayCollect_Roi[$e][0], $ArrayCollect_Roi[$f][0]);
                    swap($ArrayCollect_Roi[$e][1], $ArrayCollect_Roi[$f][1]);
                }
            }
        }

        return $ArrayCollect_Roi;
    }
}
