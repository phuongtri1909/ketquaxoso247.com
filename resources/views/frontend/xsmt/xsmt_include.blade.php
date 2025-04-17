@php $d = 1; @endphp

@foreach ($kqxsmts as $xsmts)
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

    @if ($xsmtTinh->date == date('Y-m-d', time()))
        <div class="box" id='mt_kqngay_{{ getNgayID($xsmtTinh->date) }}'>
            <div class="tit-mien clearfix">
                <h2>XSMT - Kết quả xổ số miền Trung hôm nay {{ getNgay($xsmtTinh->date) }}</h2>

                <div><a class="sub-title" href="{{ route('xsmt') }}" title="XSMT">XSMT</a> »
                    <a class="sub-title" href="{{ route(getRouteDay($xsmtTinh->day, 'xsmt')) }}"
                        title="XSMT {{ getThu($xsmtTinh->day) }}">XSMT {{ getThu($xsmtTinh->day) }}</a> » <a
                        class="sub-title" href="{{ route('xsmt.date', getNgayLink($xsmtTinh->date)) }}"
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
                                        class="v-loto-dau-0">{!! $xsmtDau[$xsmt->province->short_name][0] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">1</td>
                                @foreach ($xsmts as $xsmt)
                                    <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_1"
                                        class="v-loto-dau-1">{!! $xsmtDau[$xsmt->province->short_name][1] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">2</td>
                                @foreach ($xsmts as $xsmt)
                                    <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_2"
                                        class="v-loto-dau-2">{!! $xsmtDau[$xsmt->province->short_name][2] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">3</td>
                                @foreach ($xsmts as $xsmt)
                                    <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_3"
                                        class="v-loto-dau-3">{!! $xsmtDau[$xsmt->province->short_name][3] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">4</td>
                                @foreach ($xsmts as $xsmt)
                                    <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_4"
                                        class="v-loto-dau-4">{!! $xsmtDau[$xsmt->province->short_name][4] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">5</td>
                                @foreach ($xsmts as $xsmt)
                                    <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_5"
                                        class="v-loto-dau-5">{!! $xsmtDau[$xsmt->province->short_name][5] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">6</td>
                                @foreach ($xsmts as $xsmt)
                                    <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_6"
                                        class="v-loto-dau-6">{!! $xsmtDau[$xsmt->province->short_name][6] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">7</td>
                                @foreach ($xsmts as $xsmt)
                                    <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_7"
                                        class="v-loto-dau-7">{!! $xsmtDau[$xsmt->province->short_name][7] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">8</td>
                                @foreach ($xsmts as $xsmt)
                                    <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_8"
                                        class="v-loto-dau-8">{!! $xsmtDau[$xsmt->province->short_name][8] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">9</td>
                                @foreach ($xsmts as $xsmt)
                                    <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_9"
                                        class="v-loto-dau-9">{!! $xsmtDau[$xsmt->province->short_name][9] !!}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="see-more">
                {{-- <div class="bold see-more-title">⇒ Ngoài ra bạn có thể xem thêm:</div> --}}
                <ul class="list-html-link two-column">
                    <li>Xem ngay <a href="{{ route('dudoan.xsmt') }}" title="Dự đoán XSMT">Dự đoán XSMT</a> chính xác
                        nhất
                        hôm nay
                    </li>
                    <li>Trải nghiệm <a href="{{ route('quay_thu.mt') }}" title="quay thử XSMT">quay thử XSMT</a> hôm
                        nay có
                        độ chính xác cao</li>
                    <li>Xem bảng kết quả <a href="{{ route('xsmt.skq') }}" title="XSMT 30 ngày">XSMT 30 ngày</a> gần
                        nhất
                    </li>
                </ul>
            </div>
        </div>
    @else
        <div class="box">
            <div class="tit-mien clearfix">
                @if ($d == 1)
                    <h2>XSMT - Xổ số miền Trung {{ getNgay($xsmtTinh->date) }}</h2>
                @elseif($d == 2)
                    <h2>XSMT - Xổ số miền Trung hôm qua {{ getNgay($xsmtTinh->date) }}</h2>
                @elseif($d == 3)
                    <h2>KQXSMT - Xổ số kiến thiết miền Trung {{ getNgay($xsmtTinh->date) }}</h2>
                @elseif($d == 4)
                    <h2>xs mien trung - Xổ số đài miền Trung {{ getNgay($xsmtTinh->date) }}</h2>
                @elseif($d == 5)
                    <h2>XS MT - xo so mien trung {{ getNgay($xsmtTinh->date) }}</h2>
                @elseif($d == 6)
                    <h2>XS mien trung - Xổ số đài miền trung {{ getNgay($xsmtTinh->date) }}</h2>
                @elseif($d == 7)
                    <h2>XSKT miền Trung {{ getNgay($xsmtTinh->date) }}</h2>
                @endif

                <div><a class="sub-title" href="{{ route('xsmt') }}" title="XSMT">XSMT</a> »
                    <a class="sub-title" href="{{ route(getRouteDay($xsmtTinh->day, 'xsmt')) }}"
                        title="XSMT {{ getThu($xsmtTinh->day) }}">XSMT {{ getThu($xsmtTinh->day) }}</a> » <a
                        class="sub-title" href="{{ route('xsmt.date', getNgayLink($xsmtTinh->date)) }}"
                        title="XSMT ngày {{ getNgay($xsmtTinh->date) }}">XSMT ngày {{ getNgay($xsmtTinh->date) }}</a>
                </div>
            </div>
            <div>
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
                                        <div data-nc="2" class="v-g8 ">{{ $xsmt->g8 }}</div>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>G7</td>
                                @foreach ($xsmts as $xsmt)
                                    <td>
                                        <div data-nc="3" class="v-g7 ">{{ $xsmt->g7 }}</div>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>G6</td>
                                @foreach ($xsmts as $xsmt)
                                    <?php $g6 = explode('-', $xsmt->g6); ?>
                                    <td>
                                        <div data-nc="4" class="v-g6-0 ">
                                            @if (!empty($g6[0]))
                                                {{ $g6[0] }}
                                            @endif
                                        </div>
                                        <div data-nc="4" class="v-g6-1 ">
                                            @if (!empty($g6[1]))
                                                {{ $g6[1] }}
                                            @endif
                                        </div>
                                        <div data-nc="4" class="v-g6-2 ">
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
                                    <td>
                                        <div data-nc="4" class="v-g5 ">{{ $xsmt->g5 }}</div>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>G4</td>
                                @foreach ($xsmts as $xsmt)
                                    <?php $g4 = explode('-', $xsmt->g4); ?>
                                    <td>
                                        <div data-nc="5" class="v-g4-0 ">
                                            @if (!empty($g4[0]))
                                                {{ $g4[0] }}
                                            @endif
                                        </div>
                                        <div data-nc="5" class="v-g4-1 ">
                                            @if (!empty($g4[1]))
                                                {{ $g4[1] }}
                                            @endif
                                        </div>
                                        <div data-nc="5" class="v-g4-2 ">
                                            @if (!empty($g4[2]))
                                                {{ $g4[2] }}
                                            @endif
                                        </div>
                                        <div data-nc="5" class="v-g4-3 ">
                                            @if (!empty($g4[3]))
                                                {{ $g4[3] }}
                                            @endif
                                        </div>
                                        <div data-nc="5" class="v-g4-4 ">
                                            @if (!empty($g4[4]))
                                                {{ $g4[4] }}
                                            @endif
                                        </div>
                                        <div data-nc="5" class="v-g4-5 ">
                                            @if (!empty($g4[5]))
                                                {{ $g4[5] }}
                                            @endif
                                        </div>
                                        <div data-nc="5" class="v-g4-6 ">
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
                                        <div data-nc="5" class="v-g3-0 ">
                                            @if (!empty($g3[0]))
                                                {{ $g3[0] }}
                                            @endif
                                        </div>
                                        <div data-nc="5" class="v-g3-1 ">
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
                                        <div data-nc="5" class="v-g2 ">{{ $xsmt->g2 }}</div>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>G1</td>
                                @foreach ($xsmts as $xsmt)
                                    <td>
                                        <div data-nc="5" class="v-g1 ">{{ $xsmt->g1 }}</div>
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="gdb">
                                <td>ĐB</td>
                                @foreach ($xsmts as $xsmt)
                                    <td>
                                        <div data-nc="6" class="v-gdb ">{{ $xsmt->gdb }}</div>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <div class="control-panel">
                        <form class="digits-form"><label class="radio" data-value="0"><input type="radio"
                                    name="showed-digits" value="0">
                                <b></b><span></span></label><label class="radio" data-value="2"><input
                                    type="radio" name="showed-digits" value="2">
                                <b></b><span></span></label><label class="radio" data-value="3"><input
                                    type="radio" name="showed-digits" value="3">
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
                <div data-id="dd" class="col-firstlast {{ $table_class }} colgiai">
                    <table class="firstlast-mn bold">
                        <tbody>
                            <tr class="header">
                                <th class="first">Đầu</th>
                                @foreach ($xsmts as $xsmt)
                                    <th>{{ $xsmt->province->name }}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">0</td>
                                @foreach ($xsmts as $xsmt)
                                    <td class="v-loto-dau-0">{!! $xsmtDau[$xsmt->province->short_name][0] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">1</td>
                                @foreach ($xsmts as $xsmt)
                                    <td class="v-loto-dau-1">{!! $xsmtDau[$xsmt->province->short_name][1] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">2</td>
                                @foreach ($xsmts as $xsmt)
                                    <td class="v-loto-dau-2">{!! $xsmtDau[$xsmt->province->short_name][2] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">3</td>
                                @foreach ($xsmts as $xsmt)
                                    <td class="v-loto-dau-3">{!! $xsmtDau[$xsmt->province->short_name][3] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">4</td>
                                @foreach ($xsmts as $xsmt)
                                    <td class="v-loto-dau-4">{!! $xsmtDau[$xsmt->province->short_name][4] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">5</td>
                                @foreach ($xsmts as $xsmt)
                                    <td class="v-loto-dau-5">{!! $xsmtDau[$xsmt->province->short_name][5] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">6</td>
                                @foreach ($xsmts as $xsmt)
                                    <td id="mtloto_{{ strtoupper($xsmt->province->short_name) }}_6"
                                        class="v-loto-dau-6">{!! $xsmtDau[$xsmt->province->short_name][6] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">7</td>
                                @foreach ($xsmts as $xsmt)
                                    <td class="v-loto-dau-7">{!! $xsmtDau[$xsmt->province->short_name][7] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">8</td>
                                @foreach ($xsmts as $xsmt)
                                    <td class="v-loto-dau-8">{!! $xsmtDau[$xsmt->province->short_name][8] !!}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="clnote bold">9</td>
                                @foreach ($xsmts as $xsmt)
                                    <td class="v-loto-dau-9">{!! $xsmtDau[$xsmt->province->short_name][9] !!}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($d == 1)
                <div class="see-more">
                    <div class="bold see-more-title">⇒ Ngoài ra bạn có thể xem thêm:</div>
                    <ul class="list-html-link two-column">
                        <li>Mời bạn <a href="{{ route('quay_thu.mt') }}" title="quay thử miền Trung">quay thử miền
                                Trung</a> hôm nay để lấy hên
                        </li>
                        <li>Xem thêm <a href="{{ route('xsmt') }}" title="Kết Quả XSMT">kết quả XSMT</a></li>
                        <li>Xem bảng kết quả <a href="{{ route('xsmt.skq') }}" title="XSMT 30 ngày gần nhất">XSMT 30
                                ngày gần nhất</a></li>
                    </ul>
                </div>
            @elseif($d == 2)
                <div class="see-more">
                    <div class="bold see-more-title">⇒ Ngoài ra bạn có thể xem thêm:</div>
                    <ul class="list-html-link two-column">
                        <li>Xem thêm <a href="{{ route('home') }}" title="KQXS hôm nay">KQXS hôm nay</a></li>
                        <li>Xem thêm <a href="{{ route('vietlott') }}" title="kết quả xổ số Vietlott">kết quả xổ số
                                Vietlott</a></li>
                        <li>Xem thêm <a href="{{ route('mega645') }}" title="kết quả xổ số Mega 6/45">kết quả xổ số
                                Mega 6/45</a></li>
                    </ul>
                </div>
            @endif

        </div>
    @endif

    @php $d++; @endphp
@endforeach
