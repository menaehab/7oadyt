<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Content;
use App\Models\Category;
use App\Models\Question;
use App\Http\Requests\ContentRequest;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::paginate(10);
        return view("pages.contents.index", compact("contents"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("pages.contents.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContentRequest $request)
    {
        $data = $request->validated();

        $content = Content::create($data);

        if ($request->hasFile('file')) {
            $content->addMedia($request->file('file'))->toMediaCollection('uploads');
        }

        if ($request->hasFile('image')) {
            $content->addMedia($request->file('image'))->toMediaCollection('images');
        }

        $this->syncQuestions($content, $request->questions ?? []);

        return redirect()->route("contents.index")->with("success", __('keywords.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        return view('pages.contents.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        $categories = Category::all();
        return view('pages.contents.edit', compact('content', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContentRequest $request, Content $content)
    {
        $data = $request->validated();
        $content->update($data);

        if ($request->hasFile('file')) {
            $content->clearMediaCollection('uploads');
            $content->addMedia($request->file('file'))->toMediaCollection('uploads');
        }

        if ($request->hasFile('image')) {
            $content->clearMediaCollection('images');
            $content->addMedia($request->file('image'))->toMediaCollection('images');
        }

        $this->syncQuestions($content, $request->questions ?? []);

        return redirect()->route("contents.index")->with("success", __('keywords.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('contents.index')->with('success', __('keywords.deleted_successfully'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $contents = Content::where('name', 'like', '%' . $search . '%')
        ->orWhere('description', 'like', '%' . $search . '%')->paginate(16);
        return view('pages.content-browse', compact('contents'));
    }

    public function contentsByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $contents = Content::where('category_id', $category->id)->paginate(16);
        return view('pages.content-browse', compact('contents'));
    }

    /**
     * Sync questions and choices with the content.
     */
    private function syncQuestions(Content $content, array $questions)
    {
        $newQuestionIds = [];
        foreach ($questions as $questionData) {
            $question = Question::updateOrCreate(
                ['id' => $questionData['id'] ?? null],
                [
                    'question' => $questionData['question'],
                    'content_id' => $content->id
                ]
            );

            $newQuestionIds[] = $question->id;
            $newChoiceIds = [];

            foreach ($questionData['choices'] as $index => $choiceData) {
                $isCorrect = $index == $questionData['correct_choice'];

                $choice = Choice::updateOrCreate(
                    ['id' => $choiceData['id'] ?? null],
                    [
                        'choice' => $choiceData['choice'],
                        'is_correct' => $isCorrect,
                        'question_id' => $question->id
                    ]
                );

                $newChoiceIds[] = $choice->id;
            }

            $question->choices()->whereNotIn('id', $newChoiceIds)->delete();
        }

        $content->questions()->whereNotIn('id', $newQuestionIds)->delete();
    }

}
