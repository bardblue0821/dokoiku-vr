<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechPost;
use App\Models\TechCategory;

class TechBoardController extends Controller
{
    public function index() {
        $tech_posts = TechPost::orderBy('created_at', 'desc')->paginate(12);
        $tech_categories = TechCategory::all();

        return view('tech_board.index')
        ->with('tech_posts', $tech_posts)
        ->with('tech_categories', $tech_categories);
    }

    public function create() {
        $tech_categories = TechCategory::all();

        return view('tech_board.create', compact('tech_categories'));
    }

    public function store(Request $request) {
        // validation
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'tech_category_id' => 'required|exists:tech_categories,id',
        ]);

        // createing post
        TechPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'tech_category_id' => $request->tech_category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('tech_board.index')->with('success', 'Post created successfully!');
    }

    public function show($tech_post_id) {
        $tech_post = TechPost::findOrFail($tech_post_id);
        $tech_post_prev = TechPost::find($tech_post_id-1) ?? null;
        $tech_post_next = TechPost::find($tech_post_id+1) ?? null;

        return view('tech_board.show', compact('tech_post', 'tech_post_prev', 'tech_post_next'));
    }

    public function edit($tech_post_id) {
        $tech_post = TechPost::findOrFail($tech_post_id);
        $tech_categories = TechCategory::all();
        return view('tech_board.edit')
            ->with(['tech_post' => $tech_post])
            ->with(['tech_categories' => $tech_categories]);
    }

    public function update(Request $request, $tech_post_id) {
        // basic info storing to be validated
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'tech_category_id' => 'required|exists:tech_categories,id',
        ]);
        $validated['user_id'] = auth()->id();

        // update
        $tech_post = TechPost::findOrFail($tech_post_id);
        $tech_post->update($validated);
        $request->session()->flash('message', '更新しました');
        return redirect()->route('tech_board.show', $tech_post_id);
    }

    public function destroy(Request $request, $id)
    {
        $tech_post = TechPost::findOrFail($id);
        $tech_post->delete();
        $request->session()->flash('message', '削除しました');
        return redirect('tech_board');
    }
}
