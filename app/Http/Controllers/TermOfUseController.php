<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\WannaVisit;
use App\Models\Visited;
use App\Models\User;

class TermOfUseController extends Controller
{
    public function index() {
        return view('term_of_use/term_of_use');
    }
}
