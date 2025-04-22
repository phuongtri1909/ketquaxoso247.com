<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\TitleSeo;
use Illuminate\Http\Request;

class TitleSeoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleSeos = TitleSeo::orderBy('id', 'desc')->paginate(15);
        return view('admin.title_seo.index', compact('titleSeos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TitleSeo $titleSeo)
    {
        return view('admin.title_seo.update', compact('titleSeo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TitleSeo $titleSeo)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'keywords' => 'required|string',
            'h1' => 'nullable|string|max:255',
        ]);

        $titleSeo->update($validated);

        return redirect()->route('title-seo.index')
            ->with('success', 'SEO title đã được cập nhật thành công.');
    }
}