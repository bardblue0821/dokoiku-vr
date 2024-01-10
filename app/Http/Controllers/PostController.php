<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\WannaVisit;
use App\Models\Visited;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$posts = Post::all(); // no pagination
        $posts = Post::orderBy('created_at','desc')->paginate(18);

        // obtain requested values
        $search_body = $request->input('search_body');
        $search_category = $request->input('search_category');
        $search_selection = $request->input('search_selection');  // str:wannavisit or str:visited
        
        // search
        // build query
        $query = Post::query();
        
        if ($search_selection == 'wannavisit') {
            $user_id = Auth::id();
            $posts = Post::whereHas('wanna_visits', function($query) use($request){
                $query->where('user_id', Auth::id());
            })->orderBy('created_at', 'desc')->paginate(20);
        } elseif ($search_selection == 'visited') {
            $user_id = Auth::id();
            $posts = Post::whereHas('visiteds', function($query) use($request){
                $query->where('user_id', Auth::id());
            })->orderBy('created_at', 'desc')->paginate(20);
        }
        
        if ($search_body) {
            // transform full-space to half-space
            $spaceConversion = mb_convert_kana($search_body, 's');

            // devide by space and array ex. ["Michael","Jordan"]
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where(DB::raw("CONCAT(title, ' ', body)"), 'like', '%'.$value.'%');
            }
            
            $posts = $query->orderBy('created_at', 'desc')->paginate(20);
        }

        if ($search_category) {
            /*
            // transform full-space to half-space
            $spaceConversion = mb_convert_kana($search_category, 's');

            // devide by space and array ex. ["Michael","Jordan"]
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
      
            foreach($wordArraySearched as $value) {
                $query->where('category_id', 'like', '%'.$value.'%');
            }
            */

            $query->where('category_id', '=', $search_category);
            
            $posts = $query->orderBy('created_at', 'desc')->paginate(20);
        }

        $categories = Category::all();

        return view('post.index')
            ->with(['posts' => $posts])
            ->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // basic info storing
        $validated = $request->validate([
            'title' => 'required | max:100',
            'body' => 'max:10000',
            'image' => 'image',
            'link'=> 'required|unique:posts,link|starts_with:https://vrchat.com/home/world/wrld',
            'category_id' => 'numeric',
        ]);
        $validated['user_id'] = auth()->id();

        // image storing
        $file_name = $request->file('image');
        if($file_name) {
            $request->file('image')->storeAs('public/img', $file_name);
            $validated['image'] = 'storage/img/'.$file_name;
        }
        
        // save
        $post = Post::create($validated);    

        $request->session()->flash('mesage', '保存しました');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $image = Image::first();
        $wannavisit=WannaVisit::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        $visited=Visited::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        return view('post.show', compact('post', 'image', 'wannavisit', 'visited'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit')
            ->with(['post' => $post])
            ->with(['categories' => $categories]);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required | max:100',
            'body' => 'max:10000',
            'image' => 'image',
            'link'=> 'required|starts_with:https://vrchat.com/home/world/wrld',
            'category_id' => 'numeric',
        ]);

        $validated['user_id'] = auth()->id();

        // image storing
        $file_name = $request->file('image');
        if($file_name) {
            $request->file('image')->storeAs('public/img', $file_name);
            $validated['image'] = 'storage/img/'.$file_name;
        }

        $post->update($validated);
        $request->session()->flash('message', '更新しました');
        return redirect()->route('post.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        $request->session()->flash('message', '削除しました');
        return redirect('post');
    }
}
