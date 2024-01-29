<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function create() {
        return view('photo.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'body'  => 'required | max:400',
        ]);

        $validated['user_id'] = auth()->id();
        
        $photo = Photo::create($validated);

        return back() -> with('message', '保存しました');
    }

    public function index() {
        $photo = Photo::with('user')->orderBy('created_at', 'desc')->get();
        return view('photo.index', compact('photo'));
    }

    public function show($id) {
        $photo = Photo::find($id);
        return view('photo.show', compact('photo'));
    }

    public function edit(Post $photo) {
        return view('photo.edit', compact('photo'));
    }

    public function update(Request $request, Post $post) {
        $validated = $request->validate([
            'body'  => 'required | max:400',
        ]);

        $validated['user_id'] = auth()->id();
        
        $photo->update($validated);

        return back() -> with('message', '更新しました');
    }

    public function destroy(Request $request, Photo $photo) {
        $photo->delete();
        $request->session()->flash('message', '削除しました');
        return redirect('post');
    }
}
