<?php

namespace App\Http\Controllers\Admin;

use Cache;
use Session;
use App\Models\Gan;
use App\Models\Post;
use App\Models\Lottery;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class DuDoanXoSoController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('keyword');

        if($keyword){
            $posts = Post::where('title', 'like', '%'.$keyword.'%')->orderBy('date', 'desc')->paginate(15);
        }else{
            $posts = Post::orderBy('date', 'desc')->paginate(15);
        }

        return view('admin.posts.index', compact('posts'))->with('keyword', $keyword);

    }

    public function edit($id){
        $post = Post::find($id);
        if (!$post) {
            Session::flash('flash_warning', 'Dự đoán không tồn tại');
            return redirect()->route('posts.index');

        }
       
        return view('admin.posts.update', compact('post'));
    }

    public function update(Request $request, $id){
       
        $post = Post::find($id);
        if (!$post) {
            Session::flash('flash_warning', 'Dự đoán không tồn tại');
            return redirect()->route('posts.index');
        }

        $request->validate([
            'title' => 'required|max:255',
            'des' => 'required',
            'content' => 'required',
        ],[
            'title.required' => 'Tiêu đề không được để trống',
            'title.max' => 'Tiêu đề không được quá 255 ký tự',
            'des.required' => 'Mô tả không được để trống',
            'content.required' => 'Nội dung không được để trống',
        ]);

        $post->title = $request->title;
        $post->des = $request->des;
        $post->content = $request->content;

        if($request->hasFile('img')){
            $image = $request->file('img');
            $folderName = date('Y/m');
         
            $originalFileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalFileName . '_' . time() . '.webp';
            $uploadPath = public_path('uploads/images/dudoan/' . $folderName);

            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            $image = Image::make($image->getRealPath());
            $image->encode('webp', 75);
            $image->save($uploadPath . '/' . $fileName);

            $businessLicensePath = 'uploads/images/dudoan/' . $folderName . '/' . $fileName;
            $post->img = $businessLicensePath;
        }

        $post->save();

        Session::flash('flash_success', 'Sửa dự đoán thành công');
        return redirect()->route('posts.index');
    }
}
