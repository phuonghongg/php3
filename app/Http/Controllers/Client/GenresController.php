<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Genres;

class GenresController extends Controller
{
    //
    public function get_genre_by_slug($slug){
        $genre = DB::table('stories')
        ->select('stories.*', 'genres.slug as genre', 'genres.name as name_genre')
        ->join('genres', 'stories.slug_genre', '=', 'genres.slug')
        ->where('slug_genre', $slug)
        ->get();
        $genres = DB::table('genres')->get();
        $trending = DB::table('stories')->orderBy('viewers', 'desc')->limit(10)->get();
        $name_genre = DB::table('genres')->where('slug', $slug)->first();
        return view('Client/genre', [
            'slug_genre' => $slug,
            'genre' => $genre,
            'trending' => $trending,
            'genres' => $genres,
            'name_genre' => $name_genre,
        ]);
    }

    public function get_for_home(){
        $trending = DB::table('stories')->orderBy('viewers', 'desc')->limit(10)->get();
        $newupdate = DB::table('stories')->orderBy('created_at', 'desc')->limit(15)->get();
        $genres = DB::table('genres')->get();
        return view('Client/home', [
            'trending' => $trending,
            'update' => $newupdate,
            'genres' => $genres
        ]);
    }

}
