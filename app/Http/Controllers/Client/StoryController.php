<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoryController extends Controller
{
    //
    public function get_story_by_slug($slug){
        $story = DB::table('stories')
        ->select('stories.*', 'chapters.slug as slug_chap', 'chapters.name as name_chapter')
        ->join('chapters', 'stories.slug', '=', 'chapters.slug_story')
        ->where('slug_story', $slug)
        ->get();
        $story2 = DB::table('stories')
        ->select('stories.*', 'chapters.slug as slug_chap', 'chapters.name as name_chapter')
        ->join('chapters', 'stories.slug', '=', 'chapters.slug_story')
        ->where('slug_story', $slug)
        ->limit(5)
        ->get();
        $genres = DB::table('genres')->get();
        return view('Client/story', [
            'slug_story' => $slug,
            'story' => $story,
            'chapter' => $story2,
            'genres' => $genres
        ]);
    }
}
