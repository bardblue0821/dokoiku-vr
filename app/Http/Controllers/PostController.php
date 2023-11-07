<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create() {
        return view('post.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required | max:20',
            'body'  => 'required | max:400',
        ]);

        $validated['user_id'] = auth()->id();
        
        $post = Post::create($validated);

        // $request->session()->flash('message', '保存しました');

        return back() -> with('message', '保存しました');
    }

    public function index() {
        //$posts = Post::all();
        //$posts = Post::where('user_id', auth()->id())->get();
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
        return view('post.index', compact('posts'));
    }

    public function show($id) {
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post) {
        $validated = $request->validate([
            'title' => 'required | max:20',
            'body'  => 'required | max:400',
        ]);

        $validated['user_id'] = auth()->id();
        
        $post->update($validated);

        // $request->session()->flash('message', '保存しました');

        return back() -> with('message', '更新しました');
    }

    public function destroy(post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }
}
