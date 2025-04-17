<?php

namespace App\Http\Controllers\Frontend;


use Carbon\Carbon;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Lottery;

class DoVeOnlineController extends Controller
{
    public function getProvince($date)
    {
        $lottery_new = Lottery::orderBy('date', 'desc')->first();

        $dateFormatted = Carbon::parse($lottery_new->date)->format('Y-m-d');
        
        $dayOfWeek = Carbon::parse($dateFormatted)->dayOfWeek;

        $dayOfWeek = $dayOfWeek == 0 ? 8 : $dayOfWeek + 1;

        $provinces = Province::where('mien', '!=', '1')
            ->whereRaw('FIND_IN_SET(?, ngay_quay)', [$dayOfWeek])
            ->get();

        return response()->json([
            'provinces' => $provinces
        ]);
    }

    public function doVeOnline(Request $request)
    {

        $province = $request->query('province');
        $date = $request->query('date');
        $lotteryNumber = $request->query('lottery');

        if (!$province || !$date || !$lotteryNumber || empty($province) || empty($date) || empty($lotteryNumber) || Lottery::where('date', $date)->get()->isEmpty()) {
            $province = Province::where('slug_sc', $province)->first();
            $lotteries = Lottery::where('date', $date)->get();
            if ($lotteries->isEmpty()) {
                $date = [];
            }
            $data = compact('province', 'date', 'lotteryNumber');
            $data = array_filter($data, function ($value) {
                return !empty($value);
            });
            return view('frontend.do_ve_so.do-ve-so', $data);
        } else {
            $lotteries = Lottery::where('date', $date)->get();
            if ($province == 'mien-bac') {
                $carbonDate = Carbon::createFromFormat('Y-m-d', $date, 'Asia/Ho_Chi_Minh');
                $dayOfWeek = $carbonDate->dayOfWeek;
                $dayOfWeek = $dayOfWeek == 0 ? 8 : $dayOfWeek + 1;

                $province = Province::where('mien', '1')
                    ->whereRaw('FIND_IN_SET(?, ngay_quay)', [$dayOfWeek])
                    ->first();

                $lottery = Lottery::where('date', $date)
                    ->where('province_id', $province->id)
                    ->get();

                $matchingLotteries = collect(['gdb', 'g1', 'g2', 'g3', 'g4', 'g5', 'g6', 'g7', 'g8', 'gpdb', 'gkh'])->first(function ($column) use ($lottery, $lotteryNumber) {
                    return $lottery->contains(function ($lottery) use ($column, $lotteryNumber) {
                        if ($column === 'gpdb') {
                            // Check if only the first digit of gdb is different
                            $gdbNumbers = explode('-', $lottery->gdb);
                            foreach ($gdbNumbers as $gdbNumber) {
                                if (strlen($gdbNumber) === strlen($lotteryNumber) && substr($gdbNumber, 1) === substr($lotteryNumber, 1)) {
                                    return true;
                                }
                            }
                            return false;
                        } elseif ($column === 'gkh') {
                            // Check if any one digit of gdb is different
                            $gdbNumbers = explode('-', $lottery->gdb);
                            foreach ($gdbNumbers as $gdbNumber) {
                                if (strlen($gdbNumber) === strlen($lotteryNumber)) {
                                    $diffCount = 0;
                                    for ($i = 0; $i < strlen($gdbNumber); $i++) {
                                        if ($gdbNumber[$i] !== $lotteryNumber[$i]) {
                                            $diffCount++;
                                        }
                                        if ($diffCount > 1) {
                                            break;
                                        }
                                    }
                                    if ($diffCount === 1) {
                                        return true;
                                    }
                                }
                            }
                            return false;
                        } else {
                            // Default check for exact match
                            $numbers = explode('-', $lottery->$column);
                            return in_array($lotteryNumber, $numbers);
                        }
                    });
                }, null);

                return view('frontend.do_ve_so.do-ve-so', compact('province', 'date', 'lotteryNumber', 'matchingLotteries'));
            } else {
                $province = Province::where('slug_sc', $province)->first();
                if (!$province) {
                    $data = compact('province', 'date', 'lotteryNumber');
                    $data = array_filter($data, function ($value) {
                        return !empty($value);
                    });
                    return view('frontend.do_ve_so.do-ve-so', $data);
                }
                $lottery = Lottery::where('date', $date)
                    ->where('province_id', $province->id)
                    ->get();
                if ($lottery->isEmpty()) {
                    $data = compact('province', 'date', 'lotteryNumber');
                    $data = array_filter($data, function ($value) {
                        return !empty($value);
                    });
                    return view('frontend.do_ve_so.do-ve-so', $data);
                }

                $matchingLotteries = collect(['gdb', 'g1', 'g2', 'g3', 'g4', 'g5', 'g6', 'g7', 'g8', 'gpdb', 'gkh'])->first(function ($column) use ($lottery, $lotteryNumber) {
                    return $lottery->contains(function ($lottery) use ($column, $lotteryNumber) {
                        if ($column === 'gpdb') {
                            $gdbNumbers = explode('-', $lottery->gdb);
                            foreach ($gdbNumbers as $gdbNumber) {
                                if (strlen($gdbNumber) === strlen($lotteryNumber) && substr($gdbNumber, 1) === substr($lotteryNumber, 1)) {
                                    return true;
                                }
                            }
                            return false;
                        } elseif ($column === 'gkh') {
                            $gdbNumbers = explode('-', $lottery->gdb);
                            foreach ($gdbNumbers as $gdbNumber) {
                                if (strlen($gdbNumber) === strlen($lotteryNumber)) {
                                    $diffCount = 0;
                                    for ($i = 0; $i < strlen($gdbNumber); $i++) {
                                        if ($gdbNumber[$i] !== $lotteryNumber[$i]) {
                                            $diffCount++;
                                        }
                                        if ($diffCount > 1) {
                                            break;
                                        }
                                    }
                                    if ($diffCount === 1) {
                                        return true;
                                    }
                                }
                            }
                            return false;
                        } else {
                            $numbers = explode('-', $lottery->$column);
                            return in_array($lotteryNumber, $numbers);
                        }
                    });
                }, null);

                return view('frontend.do_ve_so.do-ve-so', compact('province', 'date', 'lotteryNumber', 'matchingLotteries'));
            }
        }
    }
}
