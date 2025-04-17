<?php

namespace App\Http\Controllers\Frontend;

use App\Models\NewLoKhung;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewLoKhungController extends Controller
{
    public function soiCauVip()
    {
        $news = NewLoKhung::where('type', 'soi-cau-vip')
            ->orderBy('id', 'desc')
            ->paginate(10);
        $type = 'soi-cau-vip';
        return view('frontend.cau-lo-de.list', compact('news','type'));
    }

    public function postSoiCauVip($slug)
    {
        $post = NewLoKhung::where('slug', $slug)
        ->where('type', 'soi-cau-vip')
            ->first();
        if (empty($post)) return view('errors.404');
        $news_more_bottom = NewLoKhung::where('type', 'soi-cau-vip')
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();
        return view('frontend.cau-lo-de.post', compact('post', 'news_more_bottom'));
    }

    public function nuoiLoKhung()
    {
        $news = NewLoKhung::where('type', 'nuoi-lo-khung')
            ->orderBy('id', 'desc')
            ->paginate(10);
        $type = 'nuoi-lo-khung';
        return view('frontend.cau-lo-de.list', compact('news', 'type'));
    }

    public function postNuoiLoKhung($slug)
    {
        $post = NewLoKhung::where('slug', $slug)
            ->where('type', 'nuoi-lo-khung')
            ->first();
        if (empty($post)) return view('errors.404');
        $news_more_bottom = NewLoKhung::where('type', 'nuoi-lo-khung')
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();
        return view('frontend.cau-lo-de.post', compact('post', 'news_more_bottom'));
    }

    public function nuoiDeKhung()
    {
        $news = NewLoKhung::where('type', 'nuoi-de-khung')
            ->orderBy('id', 'desc')
            ->paginate(10);
        $type = 'nuoi-de-khung';
        return view('frontend.cau-lo-de.list', compact('news', 'type'));
    }

    public function postNuoiDeKhung($slug)
    {
        $post = NewLoKhung::where('slug', $slug)
            ->where('type', 'nuoi-de-khung')
            ->first();
        if (empty($post)) return view('errors.404');
        $news_more_bottom = NewLoKhung::where('type', 'nuoi-de-khung')
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();
        return view('frontend.cau-lo-de.post', compact('post', 'news_more_bottom'));
    }
}
