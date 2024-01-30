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
        // validation
        $validated = $request->validate([
            'body' => 'max:400',
            'world_link' => 'nullable|starts_with:https://vrchat.com/home/world/wrld|unique:posts,link',
            'link1' => 'image',
            'link2' => 'image',
            'link3' => 'image',
            'link4' => 'image',
            'link5' => 'image',
            'link6' => 'image',
            'link7' => 'image',
            'link8' => 'image',
            'link9' => 'image',
        ]);
        $validated['user_id'] = auth()->id();
        
        // store photo
        $photo_links = ['link1', 'link2', 'link3', 'link4', 'link5', 'link6', 'link7', 'link8', 'link9'];
        foreach($photo_links as $photo_link) {
            $file_name = $request->file($photo_link);
            if($file_name) {
                $request->file($photo_link)->storeAs('public/img', $file_name);
                $validated[$photo_link] = 'storage/img/'.$file_name;
            }
        }
        // inserting
        $photo = Photo::create($validated);
        
        return redirect('/photo')->with('message', '保存しました');
    }

    public function index() {
        $photos = Photo::orderBy('created_at', 'desc')->get();
        return view('photo.index', compact('photos'));
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
