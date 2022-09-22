<?php

namespace App\Http\Controllers\quantri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Genres;
use Illuminate\Support\Str;
use App\Http\Requests\CreateGenresRequest;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $genre = Genres::orderBy('created_at', 'desc')->get();
        return view('/admin/pages/theloai/list', ['genre' => $genre]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/admin/pages/theloai/insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGenresRequest $request)
    {
        //
        $genre = new Genres;
        $genre->slug = Str::slug($request->slug, '-');
        $genre->name = $request->name;
        $genre->save();

        return back()->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $theloai = DB::table('genres')->where('slug', '=', $slug)->first();
        return view('/admin/pages/theloai/update', ['genre' => $theloai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateGenresRequest $request, $slug)
    {
        //
        $genre = Genres::where('slug', '=', $slug)->first();
        $genre->slug = Str::slug($request->slug, '-');
        $genre->name = $request->name;
        $genre->save();

        return redirect('/admin/the-loai/danh-sach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        $tin = Genres::where('slug', '=', $slug);
        $tin->delete();
        return back()->with('success', 'Xóa thành công!');
    }
}
