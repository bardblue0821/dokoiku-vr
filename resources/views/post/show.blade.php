<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>{{$world_data['name']}}</title>
  </head>
</html>

<meta
  name="description"
  content={{$world_data['description']}}
/>

<x-app-layout>
    <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="min-h-96 relative flex flex-1 shrink-0 items-center justify-center overflow-hidden bg-gray-100 py-16 shadow-lg md:py-20 xl:py-48">
                <!-- image -->
                <img alt="{{$post->title}}" src="{{asset($post->image)}}" loading="lazy"" class="absolute inset-0 h-full w-full object-cover object-center" />

                <!-- overlay-->
                <div class="absolute inset-0 bg-gray-400 mix-blend-multiply"></div>

                <!-- text -->
                <div class="relative flex flex-col items-center p-4 sm:max-w-xl">
                    <p class="mb-4 text-center text-lg text-white sm:text-xl md:mb-8">{{$world_data['authorName']}}</p>
                    <h1 class="mb-8 text-center text-4xl font-bold text-white sm:text-5xl md:mb-12 md:text-6xl">{{$world_data['name']}}</h1>

                    <div class="flex w-full flex-col gap-2.5 sm:flex-row sm:justify-center">
                        <!-- Link button -->
                        <div class="flex py-4">                        
                            @if($wannavisit)    
                                <button class="bg-red-100 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <img calss="px-4" src="{{asset('img/wannavisitbutton.png')}}" width="30px">
                                    <a href="{{ route('un_wannavisit', $post) }}" class="btn btn-success btn-sm">
                                        <span class="badge">行きたい！  {{ $post->wanna_visits->count() }}</span>
                                    </a>
                                </button>
                                
                                
                            @else
                                <button class="bg-gray-100 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <img src="{{asset('img/un_wannavisitbutton.png')}}" width="30px">
                                    <a href="{{ route('wannavisit', $post) }}" class="btn btn-secondary btn-sm">
                                        <span class="badge">行きたい！  {{ $post->wanna_visits->count() }}</span>
                                    </a>
                                </button>
                            @endif

                            @if($visited)    
                                <button class="bg-orange-100 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 mx-2 rounded inline-flex items-center">
                                    <img calss="px-4" src="{{asset('img/visitedbutton.png')}}" width="30px">
                                    <a href="{{ route('un_visited', $post) }}" class="btn btn-success btn-sm">
                                        <span class="badge">行ったよ！  {{ $post->visiteds->count() }}</span>
                                    </a>
                                </button>
                            @else
                                <button class="bg-gray-100 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 mx-2 rounded inline-flex items-center">
                                    <img src="{{asset('img/un_visitedbutton.png')}}" width="30px">
                                    <a href="{{ route('visited', $post) }}" class="btn btn-secondary btn-sm">
                                        <span class="badge">
                                            行ったよ！  {{ $post->visiteds->count() }}
                                        </span>
                                    </a>
                                </button>
                            @endif

                            <button class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded inline-flex items-center"" onclick="window.open('{{$post->link}}') " rel="noopener noreferrer" target="_blank">VRChat サイトへ</button>
                            
                        </div>
                    </div>

                    <div class="flex w-full flex-col gap-2.5 sm:flex-row sm:justify-center">
                        <div class="flex py-4"> 
                            @if (Auth::user()->id == $post->user_id)
                                <form method="post" onsubmit="return confirm('本当に削除しますか？')" action="{{route('post.destroy', $post)}}" class="flex-2">
                                    @csrf
                                    @method('delete')
                                    <button class="flex ml-2 text-white bg-red-700 border-0 py-2 px-2 focus:outline-none hover:bg-red-600 rounded">削除 delete</button>    
                                </form>

                                <a href="{{route('post.edit', $post)}}">
                                    <button class="flex ml-2 text-white bg-gray-500 border-0 py-2 px-2 focus:outline-none hover:bg-gray-700 rounded">編集 edit</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero - end -->

    <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">       
            <div class="flex flex-wrap">
                <div class="w-full px-4 lg:w-1/2">
                    <h2 class="mb-2 text-xl font-semibold text-gray-800 sm:text-2xl md:mb-4">説明 Description</h2>
                    <p class="leading-relaxed mb-4">{{$world_data['description']}}</p>
                </div>

                <div class="w-full px-4 lg:w-1/2">
                    <h2 class="mb-2 text-xl font-semibold text-gray-800 sm:text-2xl md:mb-4">投稿者コメント Comment</h2>
                    <p class="leading-relaxed mb-4">{{$post->body}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white sm:pb-8 lg:pb-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">       
            <div class="flex flex-wrap">
                <!-- left -->
                <div class="w-full px-4 lg:w-1/3">
                    <h2 class="mb-2 text-xl font-semibold text-gray-800 sm:text-2xl md:mb-4">情報 Info</h2>

                    
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">定員 Capacity</span>
                        <span class="ml-auto text-gray-900">{{$world_data['capacity']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">推奨人数 Recommended capacity</span>
                        <span class="ml-auto text-gray-900">{{$world_data['recommendedCapacity']}}</span>
                    </div>

                    <div class="flex border-t border-gray-200 py-2"></div>
                    
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">ワールド作成者 Created by</span>
                        <span class="ml-auto text-gray-900">{{$world_data['authorName']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">ワールド作成日 Created at</span>
                        <span class="ml-auto text-gray-900">{{$world_data['created_at']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">ワールド更新日 Updated at</span>
                        <span class="ml-auto text-gray-900">{{$world_data['updated_at']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">ラボ公開日 Lab Publication Date</span>
                        <span class="ml-auto text-gray-900">{{$world_data['labsPublicationDate']}}</span>
                    </div>
                </div>

                <!-- center -->
                <div class="w-full px-4 lg:w-1/3">
                    <h2 class="mb-2 text-xl font-semibold text-gray-800 sm:text-2xl md:mb-4">訪問情報 Stat</h2>

                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">総訪問者数 Visits</span>
                        <span class="ml-auto text-gray-900">{{$world_data['visits']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">お気に入り数 Favs</span>
                        <span class="ml-auto text-gray-900">{{$world_data['favorites']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">ヒート Heat</span>
                        <span class="ml-auto text-gray-900">
                            @for($i=0; $i<$world_data['heat']; $i++)
                                🔥
                            @endfor
                            {{$world_data['heat']}}
                        </span>
                    </div>

                    <div class="flex border-t border-gray-200 py-2"></div>

                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">現在の訪問者数 Occupants</span>
                        <span class="ml-auto text-gray-900">{{$world_data['occupants']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">現在のパブリック訪問者数 Public Occupants</span>
                        <span class="ml-auto text-gray-900">{{$world_data['privateOccupants']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">現在のプライベート訪問者数 Private Occupants</span>
                        <span class="ml-auto text-gray-900">{{$world_data['publicOccupants']}}</span>
                    </div>
                </div>
<<<<<<< HEAD

                <!-- right -->
                <div class="w-full px-4 lg:w-1/3">
                    <h2 class="mb-2 text-xl font-semibold text-gray-800 sm:text-2xl md:mb-4">記事情報 Post info</h2>

                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">投稿者 Posted by</span>
                        <span class="ml-auto text-gray-900">{{$post->user->name}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">ジャンル World type</span>
                        <span class="ml-auto text-gray-900">{{$post->categories->name}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">記事作成日 Created at</span>
                        <span class="ml-auto text-gray-900">{{$post->created_at}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
<<<<<<< HEAD
                        <span class="text-gray-500">記事編集日 Updated at</span>
                        <span class="ml-auto text-gray-900">{{$post->updated_at}}</span>
=======
                        <span class="text-gray-500">サイト訪問回数 </span>
                        <span class="ml-auto text-gray-900">未実装</span>
                    </div-->

                    <!-- Link button -->
                    <div class="flex py-4">                        
                        @if($wannavisit)    
                            <button class="bg-red-100 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                <img calss="px-4" src="{{asset('img/wannavisitbutton.png')}}" width="30px">
                                <a href="{{ route('un_wannavisit', $post) }}" class="btn btn-success btn-sm">
                                    <span class="badge">
                                        行きたい！  {{ $post->wanna_visits->count() }}
                                    </span>
                                </a>
                            </button>
                            
                            
                        @else
                            <button class="bg-gray-100 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                <img src="{{asset('img/un_wannavisitbutton.png')}}" width="30px">
                                <a href="{{ route('wannavisit', $post) }}" class="btn btn-secondary btn-sm">
                                    <span class="badge">
                                        行きたい！  {{ $post->wanna_visits->count() }}
                                    </span>
                                </a>
                            </button> 
                        @endif

                        @if($visited)    
                            <button class="bg-orange-100 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 mx-2 rounded inline-flex items-center">
                                <img calss="px-4" src="{{asset('img/visitedbutton.png')}}" width="30px">
                                <a href="{{ route('un_visited', $post) }}" class="btn btn-success btn-sm">
                                    <span class="badge">
                                        行ったよ！  {{ $post->visiteds->count() }}
                                    </span>
                                </a>
                            </button>
                        @else
                            <button class="bg-gray-100 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 mx-2 rounded inline-flex items-center">
                                <img src="{{asset('img/un_visitedbutton.png')}}" width="30px">
                                <a href="{{ route('visited', $post) }}" class="btn btn-secondary btn-sm">
                                    <span class="badge">
                                        行ったよ！  {{ $post->visiteds->count() }}
                                    </span>
                                </a>
                            </button>
                        @endif
=======
>>>>>>> d8689b9 (small: layout modification (section -> div))

                        <button class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 mx-2 rounded inline-flex items-center"" onclick="window.open('{{$post->link}}') " rel="noopener noreferrer" target="_blank">VRChat サイトへ</button>
                    
                        <!--button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                            </svg>
                        </button-->
                    </div>

                    
                    <div class='flex flex-row-reverse px-2 py-2'>
                        @if (Auth::user()->id == $post->user_id)
                            <form method="post" onsubmit="return confirm('本当に削除しますか？')" action="{{route('post.destroy', $post)}}" class="flex-2">
                                @csrf
                                @method('delete')
                                <button class="flex ml-2 text-white bg-red-700 border-0 py-2 px-2 focus:outline-none hover:bg-red-600 rounded">削除 delete</button>    
                            </form>

                            <a href="{{route('post.edit', $post)}}">
                                <button class="flex ml-2 text-white bg-gray-500 border-0 py-2 px-2 focus:outline-none hover:bg-gray-700 rounded">編集 edit</button>
                            </a>
                        @endif
>>>>>>> b496a88 (Revert "Revert "Reflect old() function to category in index/edit/create #7"")
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
<<<<<<< HEAD
    </div>
=======
    </section>   
>>>>>>> b496a88 (Revert "Revert "Reflect old() function to category in index/edit/create #7"")
=======
    </div> 
>>>>>>> d8689b9 (small: layout modification (section -> div))
</x-app-layout>


