<?php

namespace App\Http\Controllers\quantri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Stories;
use App\Models\Genres;
use App\Http\Requests\CreateStoryRequest;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = DB::table('stories')->orderBy('created_at', 'desc')->limit(10)->get();
        return view('admin/pages/truyen/list', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $genres = DB::table('genres')->get();
        return view('admin/pages/truyen/insert', ['genre' => $genres]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStoryRequest $request)
    {
        //
        // $name = $_POST['name'];
        $story = new Stories;
        $story->name = $request->name;
        $story->slug = Str::slug($story->name, '-');
        $story->author = $request->author;
        $story->summary = $request->summary;
        $story->url_img = $request->url_img;
        $story->slug_genre = $request->slug_genre;
        $story->status = $request->status;
        $story->source = $request->source;
        $story->save();

        return back()->with('success', $story->slug);
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
        $genres = DB::table('genres')->get();
        $truyen = DB::table('stories')->where('slug', '=', $slug)->first();
        return view(
            'admin/pages/truyen/update',
            [
                'genre' => $genres,
                'truyen' => $truyen,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateStoryRequest $request, $slug)
    {
        //
        // $name = $_POST['name'];
        $story = Stories::where('slug', '=', $slug)->first();
        $story->slug = Str::slug($story->slug, '-');
        $story->name = $request->name;
        $story->author = $request->author;
        $story->summary = $request->summary;
        $story->url_img = $request->url_img;
        $story->slug_genre = $request->slug_genre;
        $story->status = $request->status;
        $story->source = $request->source;
        $story->save();

        return redirect('/admin/truyen/danh-sach');
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
        $tin = Stories::where('slug', '=', $slug);
        $tin->delete();
        return back()->with('success', 'Xóa thành công!');
    }
}
