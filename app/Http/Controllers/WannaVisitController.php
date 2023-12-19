<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Nice;
use App\Models\WannaVisit;
use Illuminate\Support\Facades\Auth;

class WannaVisitController extends Controller
{
    public function wannavisit(Post $post, Request $request){
        $nice = New WannaVisit();
        $nice->post_id = $post->id;
        $nice->user_id = Auth::user()->id;
        $nice->save();
        return back();
    }

    public function un_wannavisit(Post $post, Request $request){
        $user = Auth::user()->id;
        $nice = WannaVisit::where('post_id', $post->id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }
}
