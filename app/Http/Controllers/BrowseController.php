<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Content;
use App\Models\UserResult;
use Illuminate\Support\Facades\Auth;

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
        $reviews = $content->reviews()->orderBy("created_at","desc")->paginate(16);
        $previousResult = UserResult::where('user_id', Auth::id())->where('content_id', $content->id)->first();
        if($content->type == "pdf") {
            return view("pages.content-detail.pdf-show", compact("content","reviews","previousResult"));
        } else if ($content->type == "video") {
            return view("pages.content-detail.video-show", compact("content","reviews","previousResult"));
        } else if ($content->type == "audio") {
            return view("pages.content-detail.audio-show", compact("content","reviews","previousResult"));
        }
        return to_route('home');
    }
}
