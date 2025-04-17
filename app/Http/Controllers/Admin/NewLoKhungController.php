<?php

namespace App\Http\Controllers\Admin;

use App\Models\NewLoKhung;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class NewLoKhungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = NewLoKhung::orderBy('id', 'DESC');

        // Filter by type if provided
        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }

        $posts = $query->paginate(30)->withQueryString();

        // Pass available types to the view - use associative array for slug => display name
        $types = [
            'soi-cau-vip' => 'Soi cầu VIP',
            'nuoi-lo-khung' => 'Nuôi lô khung',
            'nuoi-de-khung' => 'Nuôi đề khung'
        ];

        return view('admin.cau-lo-de.index', compact('posts', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Pass available types to the view
        $types = [
            'soi-cau-vip' => 'Soi cầu VIP',
            'nuoi-lo-khung' => 'Nuôi lô khung',
            'nuoi-de-khung' => 'Nuôi đề khung'
        ];
        
        return view('admin.cau-lo-de.create', compact('types'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $v = Validator::make(
            $data,
            [
                'title' => 'required|unique:new_lo_khungs',
                'content' => 'required',
                'type' => 'required|in:soi-cau-vip,nuoi-lo-khung,nuoi-de-khung',
            ]
        );
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }

        // lưu vào DB
        $post = NewLoKhung::create([
            'title' => $data['title'],
            'slug' => empty(trim($data['slug'])) ? chanetitle($data['title']) : trim($data['slug']),
            'des' => $data['des'],
            'content' => $data['content'],
            'img' => $data['img'],
            'type' => $data['type'],
        ]);

        if (!$post) {
            Session::flash('flash_warning', 'Lỗi không thêm được bài viết');
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        Session::flash('flash_success', 'Thêm bài viết thành công');
        return redirect()->route('cau-lo-de.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = NewLoKhung::find($id);
        if (!$post) {
            Session::flash('flash_warning', 'Không tồn tại!');
            return redirect()->back()->withInput();
        }

        // Pass available types to the view
        $types = [
            'soi-cau-vip' => 'Soi cầu VIP',
            'nuoi-lo-khung' => 'Nuôi lô khung',
            'nuoi-de-khung' => 'Nuôi đề khung'
        ];

        return view('admin.cau-lo-de.update', compact('post', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $qa = NewLoKhung::find($id);
        if (!$qa) {
            Session::flash('flash_warning', 'Không tìm thấy bài viết');
            return redirect()->back()->withInput();
        }

        $v = Validator::make(
            $data,
            [
                'title' => [
                    'required',
                    Rule::unique('new_lo_khungs')->ignore($id),
                ],
                'content' => 'required',
                'slug' => 'required',
                'type' => 'required|in:soi-cau-vip,nuoi-lo-khung,nuoi-de-khung',
            ]
        );
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }

        $qa->title = $data['title'];
        $qa->slug = empty(trim($data['slug'])) ? chanetitle($data['title']) : trim($data['slug']);
        $qa->des = $data['des'];
        $qa->content = $data['content'];
        $qa->img = $data['img'];
        $qa->type = $data['type'];
        $qa->save();

        if (!$qa) {
            Session::flash('flash_warning', 'Lỗi không sửa được thông tin bài viết');
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        Session::flash('flash_success', 'Update thông tin bài viết thành công');
        return redirect()->route('cau-lo-de.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = NewLoKhung::find($id)->delete();
        if (!$post) {
            return response()->json(array('code' => 0, 'msg' => 'Không xóa được'));
        }
        return response()->json(array('code' => 1, 'msg' => 'Xóa thành công'));
    }
}