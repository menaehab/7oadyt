<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function index(): View
    {
        $blogs = Blog::latest()->paginate(10);
        return view('pages.blogs.index', compact('blogs'));
    }

    public function create(): View
    {
        return view('pages.blogs.create');
    }

    public function store(BlogRequest $request): RedirectResponse
    {
        $blog = Blog::create($request->validated());
        if ($request->hasFile('image')) {
            $blog->addMedia($request->file('image'))->toMediaCollection('blogs_images');
        }
        return redirect()->route('blogs.index')->with('success',  __('keywords.created_successfully'));
    }

    public function show(Blog $blog): View
    {
        return view('pages.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog): View
    {
        return view('pages.blogs.edit', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog): RedirectResponse
    {
        $blog->update($request->validated());
        if ($request->hasFile('image')) {
            $blog->clearMediaCollection('blogs_images');
            $blog->addMedia($request->file('image'))->toMediaCollection('blogs_images');
        }
        return redirect()->route('blogs.index')->with('success',  __('keywords.updated_successfully'));
    }

    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->clearMediaCollection('blogs_images');
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', __('keywords.deleted_successfully'));
    }
}
