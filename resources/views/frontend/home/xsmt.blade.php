@php
    $xsmtTinh = $xsmts[0];

    $count = count($xsmts);

    if ($count == 3) {
        $div_class = 'three-city';
        $table_class = 'colthreecity';
    } elseif ($count == 4) {
        $div_class = 'four-city';
        $table_class = 'colfourcity';
    } elseif ($count == 2) {
        $div_class = 'two-city';
        $table_class = 'coltwocity';
    }
@endphp
<div class="box border-red" id='mt_kqngay_{{ date('dmY', time()) }}'>
    <div class="tit-mien clearfix">
        <h2>Kết quả xổ số miền Trung {{ getNgay($xsmtTinh->date) }}</h2>

        <div><a class="sub-title" href="{{ route('xsmt') }}" title="XSMT">XSMT</a> »
            <a class="sub-title" href="{{ route(getRouteDay($xsmtTinh->day, 'xsmt')) }}"
                title="XSMT {{ getThu($xsmtTinh->day) }}">XSMT {{ getThu($xsmtTinh->day) }}</a> » <a class="sub-title"
                href="{{ route('xsmt.date', getNgayLink($xsmtTinh->date)) }}"
                title="XSMT ngày {{ getNgay($xsmtTinh->date) }}">XSMT ngày {{ getNgay($xsmtTinh->date) }}</a>
        </div>
    </div>
    <div id="load_kq_mt_0">
        <div data-id="kq" class="{{ $div_class }}" data-region="3">
            <table class="{{ $table_class }} colgiai extendable">
                <tbody>
                    <tr class="gr-yellow">
                        <th class="first"></th>
                        @foreach ($xsmts as $xsmt)
                            <th data-pid="{{ $xsmt->id }}"><a
                                    href="{{ route('xstinh.tinh', $xsmt->province->slug) }}"
                                    title="Xổ số {{ $xsmt->province->name }}"
                                    class="underline bold">{{ $xsmt->province->name }}</a>
                            </th>
                        @endforeach
                    </tr>
                    <tr class="g8">
                        <td>G8</td>
                        @foreach ($xsmts as $xsmt)
                            <td>
                                <div data-nc="2" class="v-g8 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_8_item_0">
                                    {{ $xsmt->g8 }}</div>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>G7</td>
                        @foreach ($xsmts as $xsmt)
                            <td>
                                <div data-nc="3" class="v-g7 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_7_item_0">
                                    {{ $xsmt->g7 }}</div>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>G6</td>
                        @foreach ($xsmts as $xsmt)
                            <?php $g6 = explode('-', $xsmt->g6); ?>
                            <td>
                                <div data-nc="4" class="v-g6-0 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_6_item_0">
                                    @if (!empty($g6[0]))
                                        {{ $g6[0] }}
                                    @endif
                                </div>
                                <div data-nc="4" class="v-g6-1 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_6_item_1">
                                    @if (!empty($g6[1]))
                                        {{ $g6[1] }}
                                    @endif
                                </div>
                                <div data-nc="4" class="v-g6-2 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_6_item_2">
                                    @if (!empty($g6[2]))
                                        {{ $g6[2] }}
                                    @endif
                                </div>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>G5</td>
                        @foreach ($xsmts as $xsmt)
                            <td id="{{ strtoupper($xsmt->province->short_name) }}_prize_5_item_0">
                                <div data-nc="4" class="v-g5 ">{{ $xsmt->g5 }}</div>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>G4</td>
                        @foreach ($xsmts as $xsmt)
                            <?php $g4 = explode('-', $xsmt->g4); ?>
                            <td>
                                <div data-nc="5" class="v-g4-0 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_4_item_0">
                                    @if (!empty($g4[0]))
                                        {{ $g4[0] }}
                                    @endif
                                </div>
                                <div data-nc="5" class="v-g4-1 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_4_item_1">
                                    @if (!empty($g4[1]))
                                        {{ $g4[1] }}
                                    @endif
                                </div>
                                <div data-nc="5" class="v-g4-2 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_4_item_2">
                                    @if (!empty($g4[2]))
                                        {{ $g4[2] }}
                                    @endif
                                </div>
                                <div data-nc="5" class="v-g4-3 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_4_item_3">
                                    @if (!empty($g4[3]))
                                        {{ $g4[3] }}
                                    @endif
                                </div>
                                <div data-nc="5" class="v-g4-4 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_4_item_4">
                                    @if (!empty($g4[4]))
                                        {{ $g4[4] }}
                                    @endif
                                </div>
                                <div data-nc="5" class="v-g4-5 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_4_item_5">
                                    @if (!empty($g4[5]))
                                        {{ $g4[5] }}
                                    @endif
                                </div>
                                <div data-nc="5" class="v-g4-6 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_4_item_6">
                                    @if (!empty($g4[6]))
                                        {{ $g4[6] }}
                                    @endif
                                </div>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>G3</td>
                        @foreach ($xsmts as $xsmt)
                            <?php $g3 = explode('-', $xsmt->g3); ?>
                            <td>
                                <div data-nc="5" class="v-g3-0 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_3_item_0">
                                    @if (!empty($g3[0]))
                                        {{ $g3[0] }}
                                    @endif
                                </div>
                                <div data-nc="5" class="v-g3-1 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_3_item_1">
                                    @if (!empty($g3[1]))
                                        {{ $g3[1] }}
                                    @endif
                                </div>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>G2</td>
                        @foreach ($xsmts as $xsmt)
                            <td>
                                <div data-nc="5" class="v-g2 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_2_item_0">
                                    {{ $xsmt->g2 }}</div>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>G1</td>
                        @foreach ($xsmts as $xsmt)
                            <td>
                                <div data-nc="5" class="v-g1 "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_1_item_0">
                                    {{ $xsmt->g1 }}</div>
                            </td>
                        @endforeach
                    </tr>
                    <tr class="gdb">
                        <td>ĐB</td>
                        @foreach ($xsmts as $xsmt)
                            <td>
                                <div data-nc="6" class="v-gdb "
                                    id="{{ strtoupper($xsmt->province->short_name) }}_prize_Db_item_0">
                                    {{ $xsmt->gdb }}</div>
                            </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <div class="control-panel">
                <form class="digits-form"><label class="radio" data-value="0"><input type="radio"
                            name="showed-digits" value="0">
                        <b></b><span></span></label><label class="radio" data-value="2"><input type="radio"
                            name="showed-digits" value="2">
                        <b></b><span></span></label><label class="radio" data-value="3"><input type="radio"
                            name="showed-digits" value="3">
                        <b></b><span></span></label></form>
                <div class="buttons-wrapper"><span class="zoom-in-button"><i
                            class="icon zoom-in-icon"></i><span></span></span></div>
            </div>
        </div>

        @foreach ($xsmts as $xsmt)
            <?php
            $xsmtStr = $xsmt->gdb . '-' . $xsmt->g1 . '-' . $xsmt->g2 . '-' . $xsmt->g3 . '-' . $xsmt->g4 . '-' . $xsmt->g5 . '-' . $xsmt->g6 . '-' . $xsmt->g7 . '-' . $xsmt->g8;
            $xsmtLoto = getLoto($xsmtStr);
            $xsmtDau[$xsmt->province->short_name] = getDau($xsmtLoto, substr($xsmt->gdb, strlen($xsmt->gdb) - 2, 2));
            ?>
        @endforeach
    </div>
</div>

<div class="box-option">
    <div data-id="dd" class="col-firstlast {{ $table_class }} colgiai">
        <table class="firstlast-mn bold">
            <tbody>
                <tr class="header">
                    <th class="first">Đầu</th>
                    @foreach ($xsmts as $xsmt)
                        <th id="livebangkqloto_{{ strtoupper($xsmt->province->short_name) }}">
                            {{ $xsmt->province->name }}</th>
                    @endforeach
                </tr>
                <tr>
                    <td class="clnote bold">0</td>
                    @foreach ($xsmts as $xsmt)
                        <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_0"
                            class="v-loto-dau-0 text-left">{!! $xsmtDau[$xsmt->province->short_name][0] !!}</td>
                    @endforeach
                </tr>
                <tr>
                    <td class="clnote bold">1</td>
                    @foreach ($xsmts as $xsmt)
                        <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_1"
                            class="v-loto-dau-1 text-left">{!! $xsmtDau[$xsmt->province->short_name][1] !!}</td>
                    @endforeach
                </tr>
                <tr>
                    <td class="clnote bold">2</td>
                    @foreach ($xsmts as $xsmt)
                        <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_2"
                            class="v-loto-dau-2 text-left">{!! $xsmtDau[$xsmt->province->short_name][2] !!}</td>
                    @endforeach
                </tr>
                <tr>
                    <td class="clnote bold">3</td>
                    @foreach ($xsmts as $xsmt)
                        <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_3"
                            class="v-loto-dau-3 text-left">{!! $xsmtDau[$xsmt->province->short_name][3] !!}</td>
                    @endforeach
                </tr>
                <tr>
                    <td class="clnote bold">4</td>
                    @foreach ($xsmts as $xsmt)
                        <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_4"
                            class="v-loto-dau-4 text-left">{!! $xsmtDau[$xsmt->province->short_name][4] !!}</td>
                    @endforeach
                </tr>
                <tr>
                    <td class="clnote bold">5</td>
                    @foreach ($xsmts as $xsmt)
                        <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_5"
                            class="v-loto-dau-5 text-left">{!! $xsmtDau[$xsmt->province->short_name][5] !!}</td>
                    @endforeach
                </tr>
                <tr>
                    <td class="clnote bold">6</td>
                    @foreach ($xsmts as $xsmt)
                        <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_6"
                            class="v-loto-dau-6 text-left">{!! $xsmtDau[$xsmt->province->short_name][6] !!}</td>
                    @endforeach
                </tr>
                <tr>
                    <td class="clnote bold">7</td>
                    @foreach ($xsmts as $xsmt)
                        <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_7"
                            class="v-loto-dau-7 text-left">{!! $xsmtDau[$xsmt->province->short_name][7] !!}</td>
                    @endforeach
                </tr>
                <tr>
                    <td class="clnote bold">8</td>
                    @foreach ($xsmts as $xsmt)
                        <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_8"
                            class="v-loto-dau-8 text-left">{!! $xsmtDau[$xsmt->province->short_name][8] !!}</td>
                    @endforeach
                </tr>
                <tr>
                    <td class="clnote bold">9</td>
                    @foreach ($xsmts as $xsmt)
                        <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_9"
                            class="v-loto-dau-9 text-left">{!! $xsmtDau[$xsmt->province->short_name][9] !!}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="box-option p-10px m-y-20px">
    <div class="see-more">
        {{-- <div class="bold see-more-title">⇒ Ngoài ra bạn có thể xem thêm:</div> --}}
        <ul class="list-html-link two-column">
            <li>Xem ngay <a href="{{ route('dudoan.xsmt') }}" title="Dự đoán XSMT">Dự đoán XSMT</a> chính xác nhất
                hôm nay
            </li>
            <li>Trải nghiệm <a href="{{ route('quay_thu.mt') }}" title="quay thử XSMT">quay thử XSMT</a> hôm nay có
                độ chính xác cao</li>
            <li>Xem bảng kết quả <a href="{{ route('xsmt.skq') }}" title="XSMT 30 ngày">XSMT 30 ngày</a> gần nhất
            </li>
        </ul>
    </div>
</div>
