<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechPost;
use App\Models\TechCategory;

class TechBoardController extends Controller
{
    public function index() {
        $tech_posts = TechPost::all();
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
        $post = TechPost::where('id', $tech_post_id)->first();

        return view('tech_board.show', compact('post'));

    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {

    }
}
