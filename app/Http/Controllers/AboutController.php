<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\WannaVisit;
use App\Models\Visited;
use App\Models\User;

class AboutController extends Controller
{
    public function index() {
        $count_post = Post::count();
        $count_wanna_visit = WannaVisit::count();
        $count_visited = Visited::count();
        $count_user = User::count();

        return view('about/about')
        ->with(['count_post' => $count_post])
        ->with(['count_wanna_visit' => $count_wanna_visit])
        ->with(['count_visited' => $count_visited])
        ->with(['count_user' => $count_user]);
    }
}
