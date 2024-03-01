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
    public function show($id) {
        $user        = User::find($id);
        $posts       = Post::where('user_id', $id)->orderBy('created_at','desc')->paginate(12)->withQueryString();
        $wannavisits = WannaVisit::where('user_id', $id)->orderBy('created_at','desc')->paginate(12)->withQueryString();
        $visiteds    = Visited::where('user_id', $id)->orderBy('created_at','desc')->paginate(12)->withQueryString();
        $categories  = Category::all();
        $photos      = Photo::where('user_id', $id)->orderBy('created_at','desc')->paginate(12)->withQueryString();
        
        return view('users.show', compact('user','posts', 'wannavisits', 'visiteds', 'categories', 'photos'));
    }
}
