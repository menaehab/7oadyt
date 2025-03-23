<?php

namespace App\Http\Controllers;

use App\Models\Content;

class BrowseController extends Controller
{
    public function index($type = null)
    {
        $query = Content::query();
        if($type && in_array($type,["pdf","video","audio"])){
            $query->where("type",$type);
        }
        $contents = $query->paginate(16);
        return view("pages.content-browse", compact("contents"));
    }

    public function show($slug)
    {
        $content = Content::where("slug",$slug)->firstOrFail();
        if($content->type == "pdf") {
            return view("pages.content-detail.pdf-show", compact("content"));
        } else if ($content->type == "video") {
            return view("pages.content-detail.video-show", compact("content"));
        } else if ($content->type == "audio") {
            return view("pages.content-detail.audio-show", compact("content"));
        }
        return to_route('home');
    }
}
