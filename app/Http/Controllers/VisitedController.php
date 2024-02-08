<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Visited;
use App\Models\WannaVisit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VisitedController extends Controller
{
    public function visited(Post $post, Request $request){
        // create Visited record
        $nice = New Visited();
        $nice->post_id = $post->id;
        $nice->user_id = Auth::user()->id;
        $nice->save();

        // delete wanna visit if registered
        if(DB::table('wanna_visits')->where('post_id', $post->id)->exists()) {
            WannaVisit::where('post_id', $post->id)->delete();
        }

        return back();
    }

    public function un_visited(Post $post, Request $request){
        $user=Auth::user()->id;
        $nice=Visited::where('post_id', $post->id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }
}
