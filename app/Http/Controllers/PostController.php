<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\WannaVisit;
use App\Models\Visited;
use App\Models\Category;
use App\Models\Photo;
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
        $posts = Post::orderBy('created_at','desc')->paginate(12)->withQueryString();

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
            })->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        } elseif ($search_selection == 'visited') {
            $user_id = Auth::id();
            $posts = Post::whereHas('visiteds', function($query) use($request){
                $query->where('user_id', Auth::id());
            })->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }
        
        if ($search_body) {
            // transform full-space to half-space
            $spaceConversion = mb_convert_kana($search_body, 's');

            // devide by space and array ex. ["Michael","Jordan"]
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where(DB::raw("CONCAT(title, ' ', body)"), 'like', '%'.$value.'%');
            }
            
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
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
            
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }

        if ($request->ichioshi == 1) {
            $query->where('ichioshi', $request->input('ichioshi'));
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }

        if ($request->quest == 1) {
            $query->where('quest', $request->input('quest'));
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }

        if ($request->pen == 1) {
            $query->where('pen', $request->input('pen'));
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }

        if ($request->bed == 1) {
            $query->where('bed', $request->input('bed'));
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }

        if ($request->vid == 1) {
            $query->where('vid', $request->input('vid'));
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }

        if ($request->jlog == 1) {
            $query->where('jlog', $request->input('jlog'));
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }

        if ($request->imgpad == 1) {
            $query->where('imgpad', $request->input('imgpad'));
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }

        if ($request->heavy == 1) {
            $query->where('heavy', $request->input('heavy'));
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }

        if ($request->hardtojoin == 1) {
            $query->where('hardtojoin', $request->input('hardtojoin'));
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }

        if ($request->jumpscare == 1) {
            $query->where('jumpscare', $request->input('jumpscare'));
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }
        
        if ($request->violence == 1) {
            $query->where('violence', $request->input('violence'));
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }
        
        if ($request->sexual == 1) {
            $query->where('sexual', $request->input('sexual'));
            $posts = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();
        }
        // get category table
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
        $categories = Category::all();
        return view('post.create')
            ->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // basic info storing to be validated
        $validated = $request->validate([
            'body' => 'max:10000',
            'link'=> 'required|starts_with:https://vrchat.com/home/world/wrld|unique:posts,link',
            'category_id' => 'numeric',
            'ichioshi' => 'boolean',
            'quest' => 'boolean',
            'pen' => 'boolean',
            'bed' => 'boolean',
            'vid' => 'boolean',
            'jlog' => 'boolean',
            'imgpad' => 'boolean',
            'heavy' => 'boolean',
            'hardtojoin' => 'boolean',
            'jumpscare' => 'boolean',
            'violence' => 'boolean',
            'sexual' => 'boolean',
        ]);
        $validated['user_id'] = auth()->id();

        // get title and thumbnail ural by API
        $ch = curl_init(); // init curl session

        $url_raw = $validated['link'];
        $url_worldId = str_replace("https://vrchat.com/home/world/", "", $url_raw);
        $url = "https://api.vrchat.cloud/api/1/worlds/".$url_worldId;
        curl_setopt($ch, CURLOPT_URL, $url); // specify url
        $userAgent = "Laravel/1.0 (bardblue0821@gmail.com)";
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent); // specify user agent
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($ch); // get info from url
        $world_data = json_decode($res, true);

        curl_close($ch); // end session

        $validated['title'] = $world_data['name'];
        $validated['thumbnail'] = $world_data['thumbnailImageUrl'];
        $validated['desc'] = $world_data['description'];
        
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
        // get from database ////////////////
        $wannavisit = WannaVisit::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        $visited = Visited::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        
        // get from VRChat server ///////////
        $ch = curl_init(); // init curl session

        $url_raw = $post->link;
        $url_worldId = str_replace("https://vrchat.com/home/world/", "", $url_raw);
        $url = "https://api.vrchat.cloud/api/1/worlds/".$url_worldId;
        curl_setopt($ch, CURLOPT_URL, $url); // specify url
        $userAgent = "Laravel/1.0 (bardblue0821@gmail.com)";
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent); // specify user agent
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($ch); // get info from url
        $world_data = json_decode($res, true);

        curl_close($ch); // end session
     
        // get related photos that were posted before /////////////
        $query = Photo::query();
        $query->where('world_link', $url_raw);
        $photos = $query->get();

        return view('post.show', compact('post', 'wannavisit', 'visited', 'world_data', 'photos'));
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
        // basic info storing to be validated
        $validated = $request->validate([
            'body' => 'max:10000',
            'category_id' => 'numeric',
            'ichioshi' => 'boolean',
            'quest' => 'boolean',
            'pen' => 'boolean',
            'bed' => 'boolean',
            'vid' => 'boolean',
            'jlog' => 'boolean',
            'imgpad' => 'boolean',
            'heavy' => 'boolean',
            'hardtojoin' => 'boolean',
            'jumpscare' => 'boolean',
            'violence' => 'boolean',
            'sexual' => 'boolean',
        ]);
        $validated['user_id'] = auth()->id();

        // update
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
