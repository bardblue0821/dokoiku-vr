<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class IconHeaderController extends Controller
{
    public function update_icon(Request $request, $id) {
        // validation
        $request->validate([
            'icon' => 'image',
        ]);

        // store photos
        $file = $request->file('icon');

        // change path from public to storage and generate a unique filename
        $file_path = $file->storeAs('public/img/profile', uniqid().'.'.$file->getClientOriginalExtension());
        $validated['icon'] = 'img/profile/'.basename($file_path);
        
        // store photo size
        //$size = getimagesize($file_name);
        //$validated['size'.$i.'x'] = $size[0];
        //$validated['size'.$i.'y'] = $size[1];

        // inserting into DB
        $record = User::find($id);
        $record->update([
            'icon' => $validated['icon'],
        ]);

        return redirect('/profile')->with('message', 'アップロードされました。');
    }

    public function update_header(Request $request, $id) {
        // validation
        $request->validate([
            'header' => 'image',
        ]);

        // store photos
        $file = $request->file('header');

        // change path from public to storage and generate a unique filename
        $file_path = $file->storeAs('public/img/profile', uniqid().'.'.$file->getClientOriginalExtension());
        $validated['header'] = 'img/profile/'.basename($file_path);
        
        // store photo size
        //$size = getimagesize($file_name);
        //$validated['size'.$i.'x'] = $size[0];
        //$validated['size'.$i.'y'] = $size[1];

        // inserting into DB
        $record = User::find($id);
        $record->update([
            'header' => $validated['header'],
        ]);

        return redirect('/profile')->with('message', 'アップロードされました。');
    }
}
