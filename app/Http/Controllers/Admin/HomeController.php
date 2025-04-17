<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Url;
use App\Models\Province;
use App\Models\News;
use App\Models\Post;
use App\Models\SoMoNew;
use App\Models\Lottery;

class HomeController extends Controller
{
    public function index()
    {
       return redirect()->route('somo.index');
    }

    public function updateKQ(Request $request)
    {
        return view('admin.update_kq');
    }
	public function create_sitemap()
    {
		$until = date('Y-m-d');
        $since = date('Y-m-d', strtotime("-365 days"));
        //page-sitemap.xml
        $page_sitemap = Sitemap::create();
        $page_sitemap->add(Url::create(route('home'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmb'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmb.thu_2'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmb.thu_3'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmb.thu_4'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmb.thu_5'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmb.thu_6'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmb.thu_7'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmb.cn'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmb.skq'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmt'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmt.thu_2'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmt.thu_3'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmt.thu_4'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmt.thu_5'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmt.thu_6'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmt.thu_7'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmt.cn'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmt.skq'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmn'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmn.thu_2'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmn.thu_3'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmn.thu_4'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmn.thu_5'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmn.thu_6'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmn.thu_7'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmn.cn'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmn.skq'))->setLastModificationDate(\Carbon\Carbon::now()));

        $page_sitemap->add(Url::create(route('tk.dac-biet-tuan'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('tk.dac-biet-thang'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('tk.dac-biet-nam'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('tk.lo-gan-mn'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('tk.lo-gan-mt'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('tk.thong-ke-nhanh'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('tk.lo-gan','mb'))->setLastModificationDate(\Carbon\Carbon::now()));
        // $page_sitemap->add(Url::create(route('tk.dac-biet','mb'))->setLastModificationDate(\Carbon\Carbon::now()));
        // $page_sitemap->add(Url::create(route('tk.tan-suat-lo-to','mb'))->setLastModificationDate(\Carbon\Carbon::now()));
        // $page_sitemap->add(Url::create(route('tk.dau-duoi-loto','mb'))->setLastModificationDate(\Carbon\Carbon::now()));

        $page_sitemap->add(Url::create(route('scmb.cau-bach-thu'))->setLastModificationDate(\Carbon\Carbon::now()));
        //$page_sitemap->add(Url::create(route('scmb.cau-db'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('scmb.cau-truot'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('scmb.cau-loto-2nhay'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('scmb.cau-thu'))->setLastModificationDate(\Carbon\Carbon::now()));

        $page_sitemap->add(Url::create(route('quay_thu.mb'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('quay_thu.mn'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('quay_thu.mt'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('vietlott'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('mega645'))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('power655'))->setLastModificationDate(\Carbon\Carbon::now()));
        //$page_sitemap->add(Url::create(route('max3d'))->setLastModificationDate(\Carbon\Carbon::now()));
        //$page_sitemap->add(Url::create(route('max3dpro'))->setLastModificationDate(\Carbon\Carbon::now()));
        $provinces = Province::all();
		$arr_provinces = [];
        foreach ($provinces as $province) {
			$arr_provinces[$province->id] = $province;
            $page_sitemap->add(Url::create(route('xstinh.tinh',$province->slug))->setLastModificationDate(\Carbon\Carbon::now()));
			//cau-bach-thu
            $page_sitemap->add(Url::create(route('sctn.cau-bach-thu',$province->short_name))->setLastModificationDate(\Carbon\Carbon::now()));
            //cau-truot
            $page_sitemap->add(Url::create(route('sctn.cau-truot',$province->short_name))->setLastModificationDate(\Carbon\Carbon::now()));
            //cau-loto-2-nhay
            $page_sitemap->add(Url::create(route('sctn.cau-loto-2nhay',$province->short_name))->setLastModificationDate(\Carbon\Carbon::now()));
            //cau-theo-thu
            $page_sitemap->add(Url::create(route('sctn.cau-thu',$province->short_name))->setLastModificationDate(\Carbon\Carbon::now()));
        }
		
		//lay theo ngay
        $lotteries = Lottery::select('id', 'date', 'mien', 'province_id')->WhereBetween('date', [$since, $until])->get();

        $check_mt = [];
        $check_mn = [];
        foreach ($lotteries as $lottery) {
            if ($lottery->mien == 1) {
                $date_convert = date('d-m-Y', strtotime($lottery->date));
                $page_sitemap->add(Url::create(route('xsmb.date',$date_convert))->setLastModificationDate(\Carbon\Carbon::now()));
				$page_sitemap->add(Url::create(route('xstinh.date',['short_name' => $arr_provinces[$lottery->province_id]['short_name'], 'date' => $date_convert]))->setLastModificationDate(\Carbon\Carbon::now()));
            }

            if ($lottery->mien == 2) {
                $date_convert = date('d-m-Y', strtotime($lottery->date));
                if( !isset($check_mt[$lottery->date]) ) {
                    $check_mt[$lottery->date] = [];
                    $page_sitemap->add(Url::create(route('xsmt.date',$date_convert))->setLastModificationDate(\Carbon\Carbon::now()));
                }
                $page_sitemap->add(Url::create(route('xstinh.date',['short_name' => $arr_provinces[$lottery->province_id]['short_name'], 'date' => $date_convert]))->setLastModificationDate(\Carbon\Carbon::now()));
            }

            if ($lottery->mien == 3) {
                $date_convert = date('d-m-Y', strtotime($lottery->date));
                if( !isset($check_mn[$lottery->date]) ) {
                    $check_mn[$lottery->date] = [];
                    $page_sitemap->add(Url::create(route('xsmn.date',$date_convert))->setLastModificationDate(\Carbon\Carbon::now()));
                }
                $page_sitemap->add(Url::create(route('xstinh.date',['short_name' => $arr_provinces[$lottery->province_id]['short_name'], 'date' => $date_convert]))->setLastModificationDate(\Carbon\Carbon::now()));
            }

        }

        $provinces = Province::where('mien', 3)->orWhere('mien', 2)->get();
         foreach ($provinces as $province) {
             $page_sitemap->add(Url::create(route('tk.lo-gan',$province->short_name))->setLastModificationDate(\Carbon\Carbon::now()));
        //     $page_sitemap->add(Url::create(route('tk.dac-biet',$province->short_name))->setLastModificationDate(\Carbon\Carbon::now()));
        //     $page_sitemap->add(Url::create(route('tk.tan-suat-lo-to',$province->short_name))->setLastModificationDate(\Carbon\Carbon::now()));
             $page_sitemap->add(Url::create(route('tk.dau-duoi-loto',$province->short_name))->setLastModificationDate(\Carbon\Carbon::now()));
             $page_sitemap->add(Url::create(route('quay_thu.tinh',$province->short_name))->setLastModificationDate(\Carbon\Carbon::now()));
         }

        $page_sitemap->add(Url::create(route('xsmb.ngay',60))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmb.ngay',90))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmb.ngay',100))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmb.ngay',120))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmb.ngay',200))->setLastModificationDate(\Carbon\Carbon::now()));

        $page_sitemap->add(Url::create(route('xsmt.ngay',60))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmt.ngay',90))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmt.ngay',100))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmt.ngay',120))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmt.ngay',200))->setLastModificationDate(\Carbon\Carbon::now()));

        $page_sitemap->add(Url::create(route('xsmn.ngay',60))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmn.ngay',90))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmn.ngay',100))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmn.ngay',120))->setLastModificationDate(\Carbon\Carbon::now()));
        $page_sitemap->add(Url::create(route('xsmn.ngay',200))->setLastModificationDate(\Carbon\Carbon::now()));

        $page_sitemap->writeToFile(public_path('page-sitemap.xml'));



        //post-sitemap.xml
        $post_sitemap = Sitemap::create();

        $post_sitemap->add(Url::create(route('somo'))->setLastModificationDate(\Carbon\Carbon::now()));
        $post_sitemap->add(Url::create(route('news.list'))->setLastModificationDate(\Carbon\Carbon::now()));

        $news = News::all();
        foreach ($news as $new) {
            $post_sitemap->add(Url::create(route('news.post',$new->slug))->setLastModificationDate(\Carbon\Carbon::now()));
        }
		
		$posts = Post::select('id', 'date', 'category_id')->WhereBetween('date', [$since, $until])->get();

        foreach ($posts as $post) {
            $date_convert = date('d-m-Y', strtotime($post->date));
            if ($post->category_id == 1) {
                $post_sitemap->add(Url::create(route('dudoan.xsmb.date',$date_convert))->setLastModificationDate(\Carbon\Carbon::now()));
            }
            if ($post->category_id == 2) {
                $post_sitemap->add(Url::create(route('dudoan.xsmt.date',$date_convert))->setLastModificationDate(\Carbon\Carbon::now()));
            }
            if ($post->category_id == 3) {
                $post_sitemap->add(Url::create(route('dudoan.xsmn.date',$date_convert))->setLastModificationDate(\Carbon\Carbon::now()));
            }

        }
		
        $post_sitemap->writeToFile(public_path('post-sitemap.xml'));


        SitemapIndex::create()
            ->add('/page-sitemap.xml')
            ->add('/post-sitemap.xml')
            ->writeToFile(public_path('sitemap.xml'));

        return redirect()->route('somo.index');
    }
}
