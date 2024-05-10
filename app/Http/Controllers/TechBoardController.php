<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechPost;

class TechBoardController extends Controller
{
    public function index() {
        return view('tech_board.index');
    }

    public function create() {
        return view('tech_board.create');
    }

    public function store() {
        return redirect()->route('tech_board.index');
    }

    public function show() {
        return view('tech_board.create');
    }

    public function update(Request $request, TechPost $post) {
        return redirect()->route('tech_board.show', compact('post'));
    }
}
