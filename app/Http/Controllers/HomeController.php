<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Content;

class HomeController extends Controller
{
    public function index()
    {
        $contents = Content::take(6)->latest()->get();
        $blogs = Blog::take(6)->latest()->get();
        return view("pages.home",compact("contents","blogs"));
    }
}
