<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
        $search = $request->input('search');

        // もし検索フォームにキーワードが入力されたら
        if ($search) {
            // クエリビルダ
            $query = Post::query();

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('title', 'like', '%'.$value.'%');
            }

            // 上記で取得した$queryをページネートにし、変数$usersに代入
            $posts = $query->paginate(20);
        }


        return view('post.index')->with(['posts' => $posts, 'search' => $search]);
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
        $validated = $request->validate([
            'title' => 'required | max:100',
            'body'  => 'max:10000',
            'image' => 'image',
            'tag' => 'required',
            'link' => 'required | starts_with:https://vrchat.com/home/world/wrld',
        ]);
        $validated['user_id'] = auth()->id();

        if(request('image')){
            $filename=request()->file('image')->getClientOriginalName();
            $validated['image']=request('image')->storeAs('public/images', $filename);
        }

        $post = Post::create($validated);        

        $request->session()->flash('mesage', '保存しました');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
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
            'title' => 'required | max:20',
            'body'  => 'required | max:5000',
            'image' => 'image',
            'tag' => 'required',
            'link' => 'required | starts_with:https://vrchat.com/home/world/wrld',
        ]);

        $validated['user_id'] = auth()->id();
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
