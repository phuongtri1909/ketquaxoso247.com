@foreach($kqxsmts as $xsmts)    @php    $xsmtTinh = $xsmts[0];    $count = count($xsmts);    if($count==3){    $div_class = 'three-city';    $table_class = 'colthreecity';    }elseif($count==4){    $div_class = 'four-city';    $table_class = 'colfourcity';    }elseif($count==2){    $div_class = 'two-city';    $table_class = 'coltwocity';    }    @endphp    <tr>        <td class="date">            {{getThu($xsmtTinh->day)}}           <br>            {{getNgay($xsmtTinh->date)}}        </td>        @foreach ($xsmts as $xsmt)            <td>                {{$xsmt->province->name}}                <br>                <b>{{$xsmt->g8}}</b>−<b class="red">{{substr($xsmt->gdb,-2)}}</b>            </td>        @endforeach    </tr>@endforeach