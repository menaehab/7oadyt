<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\UserResult;
use App\Http\Requests\QuizRequest;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index($slug)
    {
        $questions = Content::where("slug", $slug)->first()->questions()->get();
        return view("pages.quiz", compact("questions","slug"));
    }

    public function submit(QuizRequest $request, $slug)
    {
        $correctAnswers = 0;
        $content = Content::where("slug", $slug)->firstOrFail();
        $totalQuestions = $content->questions()->count();
        $data = $request->validated();
        $questions = $content->questions;

        foreach ($questions as $question) {
            $userAnswer = $data['answers'][$question->id];
            if ($question->correctChoice->id == $userAnswer){
                $correctAnswers++;
            }
        }

        UserResult::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'content_id' => $content->id,
            ],
            [
                'correct_answers' => $correctAnswers,
                'total_questions' => $totalQuestions
            ]
        );

        return redirect()->back()->with('result', "لقد أجبت على $correctAnswers من أصل $totalQuestions بشكل صحيح");
    }

}
