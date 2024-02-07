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
            'world_link' => 'nullable|starts_with:https://vrchat.com/home/world/wrld',
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
        
        // store photos
        $count = 0;
        foreach(range(1,9) as $i) {
            $file_name = $request->file('link'.$i);
            if($file_name) {
                $file_name->storeAs('public/img', $file_name);
                $validated['link'.$i] = 'storage/img/'.$file_name;

                $size = getimagesize($file_name);
                // store photo size
                $validated['size'.$i.'x'] = $size[0];
                $validated['size'.$i.'y'] = $size[1];

                $count++;
            }
        }
        // num of photos
        $validated['number'] = $count;

        // inserting into DB
        $photo = Photo::create($validated);
        
        return redirect('/photo')->with('message', '');
    }

    public function index() {
        $photos = Photo::orderBy('created_at', 'desc')->paginate(6)->withQueryString();;
        return view('photo.index', compact('photos'));
    }

    public function show($id) {
        $photo = Photo::find($id);
        return view('photo.show', compact('photo'));
    }

    public function edit(Post $photo) {
    }

    public function update(Request $request, Post $post) {
    }

    public function destroy(Request $request, Photo $photo) {
        $photo->delete();
        $request->session()->flash('message', '削除しました');
        return back();
    }
}
