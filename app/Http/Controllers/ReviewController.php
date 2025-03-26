<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        Review::create([
            "user_id" => auth()->id(),
            "content_id" => $request->content_id,
            "comment" => $request->comment,
            "rating" => $request->rating
        ]);
        return back()->with("success","تم اضافة التقييم بنجاح");
    }

    public function destroy(Review $review)
    {
        if ($review->user_id != Auth::user()->id) {
            @dd($review->user_id,Auth::user()->id);
            abort(403);
        }
        $review->delete();
        return back()->with("success","تم حذف التقييم بنجاح");
    }
}