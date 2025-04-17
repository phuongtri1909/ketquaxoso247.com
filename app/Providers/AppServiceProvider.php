<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.layouts._footer', function ($view) {
            $links_footer = \App\Models\LinkFooter::get();
            $view->with('links_footer', $links_footer);
        });

        View::composer('*', function ($view) {
            $linkHeaders = \App\Models\LinkHeader::get();
           
            $lottery_mt = \App\Models\Lottery::orderBy('date', 'desc')->where('mien',2)->first();
            $lottery_mn = \App\Models\Lottery::orderBy('date', 'desc')->where('mien',3)->first();

            $date_mt_plus_one = Carbon::parse($lottery_mt->date)->addDay()->format('Y-m-d');
            $date_mn_plus_one = Carbon::parse($lottery_mn->date)->addDay()->format('Y-m-d');
            
            // Lấy các bài viết với date đã cộng thêm 1 ngày
            $posts_mt = \App\Models\Post::where('category_id', 2)
                ->where('province_id', '!=', null)
                ->where('date', $date_mt_plus_one)
                ->orderBy('created_at', 'desc')
                ->get();

            $posts_mn = \App\Models\Post::where('category_id', 3)
                ->where('province_id', '!=', null)
                ->where('date', $date_mn_plus_one)
                ->orderBy('created_at', 'desc')
                ->get();
            
            $view->with('linkHeaders', $linkHeaders)->with('posts_mt', $posts_mt)->with('posts_mn', $posts_mn);
        });
    }
}
