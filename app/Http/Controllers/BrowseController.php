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
        return view("pages.content-show", compact("content"));
    }
}
