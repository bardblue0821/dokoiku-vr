<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\WannaVisit;
use App\Models\Visited;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$posts = Post::all();
        $posts = Post::orderBy('created_at','desc')->paginate(18);

        // 検索フォームで入力された値を取得する
        $search_body = $request->input('search_body');
        $search_tag = $request->input('search_tag');

        // クエリビルダ
        $query = Post::query();
        $posts = $query->orderBy('created_at', 'desc')->paginate(20);
        
        if ($search_body) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search_body, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where(DB::raw("CONCAT(title, ' ', body)"), 'like', '%'.$value.'%');
            }
            
            $posts = $query->orderBy('created_at', 'desc')->paginate(20);
        }

        if ($search_tag) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search_tag, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('tag', 'like', '%'.$value.'%');
            }
            
            $posts = $query->orderBy('created_at', 'desc')->paginate(20);
        }

        $image = Image::first();

        return view('post.index')->with(['posts' => $posts, 'search_body' => $search_body, 'image' => $image]);
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
            'tag' => 'required',
            'link'=> 'required|unique:posts,link|starts_with:https://vrchat.com/home/world/wrld',
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
        
        // image storing
        //$file_name = $request->file('image');
        //$request->file('image')->storeAs('public/img', $file_name);
        //$image = new Image();
        //$image->name = $file_name;
        //$image->path = 'storage/img/'.$file_name;
        //$image->save();

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
        return view('post.edit', compact('post'));
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
            'tag' => 'required',
            'link'=> 'required|starts_with:https://vrchat.com/home/world/wrld',
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
