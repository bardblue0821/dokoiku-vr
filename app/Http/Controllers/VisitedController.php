<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Visited;
use Illuminate\Support\Facades\Auth;

class VisitedController extends Controller
{
    public function visited(Post $post, Request $request){
        $nice=New Visited();
        $nice->post_id=$post->id;
        $nice->user_id=Auth::user()->id;
        $nice->save();
        return back();
    }

    public function un_visited(Post $post, Request $request){
        $user=Auth::user()->id;
        $nice=Visited::where('post_id', $post->id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }
}
