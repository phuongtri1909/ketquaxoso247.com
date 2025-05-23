<?php
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SoMoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\XSLiveController;
use App\Http\Controllers\Admin\SoMoNewController;
use App\Http\Controllers\Admin\TitleSeoController;
use App\Http\Controllers\Admin\DuDoanXoSoController;
use App\Http\Controllers\Admin\LinkFooterController;
use App\Http\Controllers\Admin\LinkHeaderController;
use App\Http\Controllers\Admin\NewLoKhungController;
use App\Http\Controllers\Admin\HtmlContentController;
use App\Http\Controllers\Admin\CustomUploadController;

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.post');


Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	Route::post('setting/sitemap', [HomeController::class, 'create_sitemap'])->name('createsitemap');

    Route::get('user/update-password', [UserController::class, 'showUpdatePassword'])->name('user.changePass');
    Route::post('user/update-password', [UserController::class, 'updatePassword'])->name('user.changePass.post');
    Route::get('update-kq', [HomeController::class, 'updateKQ'])->name('updatekq');

    Route::get('update-live/{id}', [XSLiveController::class, 'edit'])->name('live.edit');
    Route::post('update-live/{id}', [XSLiveController::class, 'update'])->name('live.update');

    Route::resource('somo', SoMoController::class);
    Route::resource('somonew', SoMoNewController::class);
    Route::resource('news', NewsController::class);
    Route::resource('cau-lo-de', NewLoKhungController::class);
    Route::resource('user', UserController::class);

    Route::resource('title-seo', TitleSeoController::class)->except(['show','create'.'destroy']);

    Route::resource('posts', DuDoanXoSoController::class)->except(['show','create','store','destroy']);

    Route::resource('link-footer', LinkFooterController::class)->except(['show','create','edit']);
    Route::resource('link-header', LinkHeaderController::class)->except(['show','create','edit']);

    Route::get('content_html/{key}', [HtmlContentController::class, 'index'])->name('content_html');
    Route::post('content_html/{key}', [HtmlContentController::class, 'update'])->name('content_html.update');

    Route::group(['prefix' => 'laravel-filemanager', 'as' => 'admincp.lfm.'], function () {
        Lfm::routes();

        Route::post('/upload', [CustomUploadController::class, 'upload'])->name('lfm.upload');
    });
});


