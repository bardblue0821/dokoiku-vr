<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\WannaVisit;
use App\Models\Visited;
use App\Models\Category;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function show($id, $info) {
        $user   = User::find($id);
        $posts  = Post::where('user_id', $id)->orderBy('created_at','desc')->paginate(12)->withQueryString();
        $photos = Photo::where('user_id', $id)->orderBy('created_at','desc')->paginate(6)->withQueryString();
        
        $posts_N  = Post::where('user_id', $id)->count();
        $photos_N = Photo::where('user_id', $id)->count();
        $wannavisits_N = WannaVisit::where('user_id', $id)->count();
        $visiteds_N    = Visited::where('user_id', $id)->count();
        
        $categories    = Category::all();

        if ($info == 'posted_world') {
            return view('users.posted_world', compact('user', 'posts', 'posts_N', 'wannavisits_N', 'visiteds_N', 'photos_N', 'categories'));    

        } elseif ($info == 'wannavisit_world') {
            $posts = Post::whereHas('wanna_visits', function ($query) use ($id) {
                $query->where('user_id', $id);
            })->paginate(12)->withQueryString();
            return view('users.wannavisit_world', compact('user', 'posts', 'posts_N', 'wannavisits_N', 'visiteds_N', 'photos_N', 'categories'));    

        } elseif ($info == 'visited_world') {
            $posts = Post::whereHas('visiteds', function ($query) use ($id) {
                $query->where('user_id', $id);
            })->paginate(12)->withQueryString();
            return view('users.visited_world', compact('user', 'posts', 'posts_N', 'wannavisits_N', 'visiteds_N', 'photos_N', 'categories'));    

        } elseif ($info == 'posted_photo') {
            return view('users.posted_photo', compact('user', 'photos', 'posts_N', 'wannavisits_N', 'visiteds_N', 'photos_N', 'categories'));    
        }
    }
}
