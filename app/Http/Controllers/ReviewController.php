<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\ReviewRequest;

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

    public function destory(Review $review)
    {
        if ($review->user_id != auth()->id()) {
            abort(403);
        }
        $review->delete();
        return back()->with("success","تم حذف التقييم بنجاح");
    }
}
