<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Dokoiku VR - {{$world_data['name']}}</title>
    <link rel="shortcut icon" href="img/favicon.ico">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.2.2/photoswipe.min.css"
        integrity="sha512-aKJqqX25Ch6C/Gae4xBq5gDKhUS2QcNrPoAxqy4fbLr9CqGq7uo/i0aRuti1TUYpZxjXuOr90cTP/aD9WY8CLQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
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
                <img alt="{{$post->title}}" src="{{$world_data['imageUrl']}}" loading="lazy" class="absolute inset-0 h-full w-full object-cover object-center" />

                <!-- overlay-->
                <div class="absolute inset-0 bg-gray-600 mix-blend-multiply"></div>

                <!-- text -->
                <div class="relative flex flex-col items-center">
                    <p class="mb-4 text-center text-lg text-white sm:text-xl md:mb-8">{{$world_data['authorName']}}</p>
                    <h1 class="mb-4 text-center text-4xl font-bold text-white sm:text-5xl md:mb-6 md:text-6xl">{{$world_data['name']}}</h1>
                    <div class="flex mb-4">
                        @if($post->ichioshi)  <img class="h-6 mr-3" src="{{asset('img/icon/ichioshi.svg')}}"   alt="投稿者イチ押し！">@endif
                        @if($post->quest)     <img class="h-6 mr-3" src="{{asset('img/icon/quest.svg')}}"      alt="クエスト対応">@endif
                        @if($post->pen)       <img class="h-6 mr-3" src="{{asset('img/icon/pen.svg')}}"        alt="ペンあり">@endif
                        @if($post->bed)       <img class="h-6 mr-3" src="{{asset('img/icon/bed.svg')}}"        alt="ベッドあり">@endif
                        @if($post->vid)       <img class="h-6 mr-3" src="{{asset('img/icon/vid.svg')}}"        alt="ビデオプレイヤーあり">@endif
                        @if($post->jlog)      <img class="h-6 mr-3" src="{{asset('img/icon/jlog.svg')}}"       alt="ジョインログあり">@endif
                        @if($post->imgpad)    <img class="h-6 mr-3" src="{{asset('img/icon/imgpad.svg')}}"     alt="イメージパッドあり">@endif
                    </div>
                    <div class="flex mb-4">
                        @if($post->heavy)     <img class="h-6 mr-3" src="{{asset('img/icon/heavy.svg')}}"      alt="高負荷">@endif
                        @if($post->hardtojoin)<img class="h-6 mr-3" src="{{asset('img/icon/hardtojoin.svg')}}" alt="合流難しい">@endif
                        @if($post->jumpscare) <img class="h-6 mr-3" src="{{asset('img/icon/jumpscare.svg')}}"  alt="ジャンプスケア">@endif
                        @if($post->violence)  <img class="h-6 mr-3" src="{{asset('img/icon/violence.svg')}}"   alt="暴力表現">@endif
                        @if($post->sexual)    <img class="h-6 mr-3" src="{{asset('img/icon/sexual.svg')}}"     alt="性的表現">@endif
                    </div>

                    
                    <!-- Link button -->
                    <div class="flex py-4">                        
                        @if($post->wanna_visits()->where('post_id', $post->id)->where('user_id', Auth::user()->id)->count()) 
                            <a href="{{ route('un_wannavisit', $post) }}" class="btn btn-success btn-sm">
                                <button class="text-sm border-2 border-red-500 bg-red-800 hover:bg-red-800 bg-opacity-70 text-white font-bold py-1 px-3 rounded inline-flex items-center">
                                    <img class="mr-2" src="{{asset('img/wannavisitbutton.png')}}" width="20px">
                                    <span class="badge">行きたい！  {{ $post->wanna_visits->count() }}</span>
                                </button>
                            </a>
                        @else
                            <a href="{{ route('wannavisit', $post) }}" class="btn btn-secondary btn-sm">
                                <button class="text-sm border-2 border-gray-300 bg-gray-600 hover:bg-gray-400 bg-opacity-70 text-white font-bold py-1 px-3 rounded inline-flex items-center">
                                    <img class="mr-2" src="{{asset('img/un_wannavisitbutton.png')}}" width="20px">
                                    <span class="badge">行きたい！  {{ $post->wanna_visits->count() }}</span>
                                </button>
                            </a>
                        @endif

                        @if($post->visiteds()->where('post_id', $post->id)->where('user_id', Auth::user()->id)->count())
                            <a href="{{ route('un_visited', $post) }}" class="btn btn-success btn-sm">
                                <button class="ml-2 text-sm border-2 border-orange-300 bg-orange-600 hover:bg-orange-600 bg-opacity-70 text-white font-bold py-1 px-3 rounded inline-flex items-center">
                                    <img class="mr-2" src="{{asset('img/visitedbutton.png')}}" width="20px">
                                    <span class="badge">行ったよ！  {{ $post->visiteds->count() }}</span>
                                </button>
                            </a>
                        @else
                            <a href="{{ route('visited', $post) }}" class="btn btn-secondary btn-sm">
                                <button class="ml-2 text-sm border-2 border-gray-300 bg-gray-600 hover:bg-gray-400 bg-opacity-70 text-white font-bold py-1 px-3 rounded inline-flex items-center">
                                    <img class="mr-2" src="{{asset('img/un_visitedbutton.png')}}" width="20px">
                                    <span class="badge">行ったよ！  {{ $post->visiteds->count() }}</span>
                                </button>
                            </a>
                        @endif

                        <button class="ml-2 text-sm border-2 border-teal-500 bg-teal-500 hover:bg-teal-500 bg-opacity-70 text-white font-bold py-1 px-3 rounded inline-flex items-center"" onclick="window.open('{{$post->link}}') " rel="noopener noreferrer" target="_blank">VRChat サイトへ</button>
                        
                    </div>
                

                
                    <div class="flex py-4"> 
                        @if (Auth::user()->id == $post->user_id)
                            <a href="{{route('post.edit', $post)}}">
                                <button class="flex text-sm font-bold text-gray-400 bg-opacity-100 border-2 border-gray-400 py-1 px-4 hover:bg-gray-400 hover:text-white rounded">編集</button>    
                            </a>

                            <form method="post" onsubmit="return confirm('本当に削除しますか？')" action="{{route('post.destroy', $post)}}" class="flex-2">
                                @csrf
                                @method('delete')
                                <button class="ml-2 flex text-sm font-bold text-red-700 bg-opacity-100 border-2 border-red-700 py-1 px-4 hover:bg-red-700 hover:text-white rounded">削除</button>    
                            </form>
                        @endif
                    </div>
                
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
        <div class="flex flex-wrap mx-auto max-w-screen-2xl px-4 md:px-8">   
            @foreach($world_data['tags'] as $tag)
                <span class="border-2 border-gray-400 bg-gray-100 rounded px-4 py-2 mr-3 mb-4">
                    {{str_replace('author_tag_', '', $tag);}}
                </span>  
            @endforeach
        </div>
    </div>

    <!-- information 1 -->
    <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">       
            <div class="flex flex-wrap">
                <div class="w-full px-4 lg:w-1/2">
                    <h2 class="mb-2 text-xl font-semibold text-gray-800 sm:text-2xl md:mb-4">説明</h2>
                    <p class="leading-relaxed mb-4">{!! nl2br(e($world_data['description'])) !!}</p>
                </div>

                <div class="w-full px-4 lg:w-1/2">
                    <h2 class="mb-2 text-xl font-semibold text-gray-800 sm:text-2xl md:mb-4">投稿者コメント by {{$post->user->name}}</h2>
                    <p class="leading-relaxed mb-4">{!! nl2br(e($post->body)) !!}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- information 2 -->
    <div class="bg-white sm:pb-8 lg:pb-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">       
            <div class="flex flex-wrap">
                <!-- left -->
                <div class="w-full px-4 lg:w-1/3">
                    <h2 class="mb-2 mt-4 text-xl font-semibold text-gray-800 sm:text-2xl md:mb-4">情報</h2>

                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">定員</span>
                        <span class="ml-auto text-gray-900">{{$world_data['capacity']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">推奨人数</span>
                        <span class="ml-auto text-gray-900">{{$world_data['recommendedCapacity']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">ワールド作成者</span>
                        <span class="ml-auto text-gray-900">{{$world_data['authorName']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">ワールド作成日</span>
                        <span class="ml-auto text-gray-900">{{$world_data['created_at']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">ワールド更新日</span>
                        <span class="ml-auto text-gray-900">{{$world_data['updated_at']}}</span>
                    </div>
                    <div class="flex border-t border-b border-gray-200 py-2">
                        <span class="text-gray-500">ラボ公開日</span>
                        <span class="ml-auto text-gray-900">{{$world_data['labsPublicationDate']}}</span>
                    </div>
                </div>

                <!-- center -->
                <div class="w-full px-4 lg:w-1/3">
                    <h2 class="mb-2 mt-4 text-xl font-semibold text-gray-800 sm:text-2xl md:mb-4">訪問情報</h2>

                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">総訪問者数</span>
                        <span class="ml-auto text-gray-900">{{$world_data['visits']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">お気に入り数</span>
                        <span class="ml-auto text-gray-900">{{$world_data['favorites']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">ヒート</span>
                        <span class="ml-auto text-gray-900">
                            @for($i=0; $i<$world_data['heat']; $i++)
                                🔥
                            @endfor
                            {{$world_data['heat']}}
                        </span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">現在の訪問者数</span>
                        <span class="ml-auto text-gray-900">{{$world_data['occupants']}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">現在のパブリック訪問者数</span>
                        <span class="ml-auto text-gray-900">{{$world_data['privateOccupants']}}</span>
                    </div>
                    <div class="flex border-t border-b border-gray-200 py-2">
                        <span class="text-gray-500">現在のプライベート訪問者数</span>
                        <span class="ml-auto text-gray-900">{{$world_data['publicOccupants']}}</span>
                    </div>
                </div>
                
                <!-- right -->
                <div class="w-full px-4 lg:w-1/3">
                    <h2 class="mb-2 mt-4 text-xl font-semibold text-gray-800 sm:text-2xl md:mb-4">記事情報</h2>

                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">投稿者</span>
                        <span class="ml-auto text-gray-900">{{$post->user->name}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">ジャンル</span>
                        <span class="ml-auto text-gray-900">{{$post->categories->name}}</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">記事作成日</span>
                        <span class="ml-auto text-gray-900">{{$post->created_at}}</span>
                    </div>
                    <div class="flex border-t border-b border-gray-200 py-2">
                        <span class="text-gray-500">記事編集日</span>
                        <span class="ml-auto text-gray-900">{{$post->updated_at}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!-- posted photos gallery -->
    <div class="bg-white sm:pb-8 lg:pb-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8 grid gap-5 grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2">
            @foreach($photos as $photo)
                <div class="flex-col bg-white rounded-lg border-2 my-2 p-2 ">
                    <div class="text-teal-500 text-2xl font-bold">  <!-- user name -->
                        {{$photo->user->name}}
                    </div>
                    <div class="text-gray-400 text-xs mb-2">  <!-- created at -->
                        {{$photo->created_at}}
                    </div>
                    <div class="text-gray-600 text-base mb-2">  <!-- body -->
                        @isset($photo->body)
                            {{\Illuminate\Support\Str::limit($photo->body, 400, '...')}}
                        @else
                            <div class="text-gray-400 text-base">No comment...</div>
                            
                        @endisset
                    </div>
                    <div class="gallery" id="photoGallery">  <!-- photo -->
                        @if($photo->number == 1) <!-- 1 photo view-->
                            <div class="grid gap-0 grid-cols-1">
                                @isset($photo->link1)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link1}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size1x}}" data-pswp-height="{{$photo->size1y}}" target="_blank">
                                            <img src="../{{$photo->link1}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset
                                
                                @isset($photo->link2)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link2}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size2x}}" data-pswp-height="{{$photo->size2y}}" target="_blank">
                                            <img src="../{{$photo->link2}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link3)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link3}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size3x}}" data-pswp-height="{{$photo->size3y}}" target="_blank">
                                            <img src="../{{$photo->link3}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link4)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link4}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size4x}}" data-pswp-height="{{$photo->size4y}}" target="_blank">
                                            <img src="../{{$photo->link4}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link5)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link5}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size5x}}" data-pswp-height="{{$photo->size5y}}" target="_blank">
                                            <img src="../{{$photo->link5}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link6)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link6}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size6x}}" data-pswp-height="{{$photo->size6y}}" target="_blank">
                                            <img src="../{{$photo->link6}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link7)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link7}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size7x}}" data-pswp-height="{{$photo->size7y}}" target="_blank">
                                            <img src="../{{$photo->link7}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link8)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link8}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size8x}}" data-pswp-height="{{$photo->size8y}}" target="_blank">
                                            <img src="../{{$photo->link8}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link9)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link9}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size9x}}" data-pswp-height="{{$photo->size9y}}" target="_blank">
                                            <img src="../{{$photo->link9}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset
                            </div>
                        @elseif($photo->number > 1 && $photo->number <= 4)  <!-- 4 photos view-->
                            <div class="grid gap-0 grid-cols-2">
                                @isset($photo->link1)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link1}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size1x}}" data-pswp-height="{{$photo->size1x}}" target="_blank">
                                            <img src="../{{$photo->link1}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset
                                
                                @isset($photo->link2)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link2}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size2x}}" data-pswp-height="{{$photo->size2y}}" target="_blank">
                                            <img src="../{{$photo->link2}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link3)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link3}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size3x}}" data-pswp-height="{{$photo->size3y}}" target="_blank">
                                            <img src="../{{$photo->link3}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link4)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link4}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size4x}}" data-pswp-height="{{$photo->size4y}}" target="_blank">
                                            <img src="../{{$photo->link4}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link5)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link5}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size5x}}" data-pswp-height="{{$photo->size5y}}" target="_blank">
                                            <img src="../{{$photo->link5}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link6)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link6}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size6x}}" data-pswp-height="{{$photo->size6y}}" target="_blank">
                                            <img src="../{{$photo->link6}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link7)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link7}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size7x}}" data-pswp-height="{{$photo->size7y}}" target="_blank">
                                            <img src="../{{$photo->link7}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link8)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link8}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size8x}}" data-pswp-height="{{$photo->size8y}}" target="_blank">
                                            <img src="../{{$photo->link8}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link9)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link9}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size9x}}" data-pswp-height="{{$photo->size9y}}" target="_blank">
                                            <img src="../{{$photo->link9}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset
                            </div>
                        @elseif($photo->number > 4)  <!-- 9 photos view-->
                            <div class="grid gap-0 grid-cols-3">
                                @isset($photo->link1)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link1}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size1x}}" data-pswp-height="{{$photo->size1y}}" target="_blank">
                                            <img src="../{{$photo->link1}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset
                                
                                @isset($photo->link2)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link2}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size2x}}" data-pswp-height="{{$photo->size2y}}" target="_blank">
                                            <img src="../{{$photo->link2}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link3)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link3}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size3x}}" data-pswp-height="{{$photo->size3y}}" target="_blank">
                                            <img src="../{{$photo->link3}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link4)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link4}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size4x}}" data-pswp-height="{{$photo->size4y}}" target="_blank">
                                            <img src="../{{$photo->link4}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link5)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link5}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size5x}}" data-pswp-height="{{$photo->size5y}}" target="_blank">
                                            <img src="../{{$photo->link5}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link6)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link6}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size6x}}" data-pswp-height="{{$photo->size6y}}" target="_blank">
                                            <img src="../{{$photo->link6}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link7)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link7}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size7x}}" data-pswp-height="{{$photo->size7y}}" target="_blank">
                                            <img src="../{{$photo->link7}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link8)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link8}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size8x}}" data-pswp-height="{{$photo->size8y}}" target="_blank">
                                            <img src="../{{$photo->link8}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link9)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="../{{$photo->link9}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size9x}}" data-pswp-height="{{$photo->size9y}}" target="_blank">
                                            <img src="../{{$photo->link9}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset
                            </div>
                        @else
                            <div class="text-gray-400 text-base h-auto mb-2">
                                no photo...
                            </div>
                        @endif

                        
                    </div>
                    @isset($photo->world_link)  <!-- world button -->
                        <button class="bg-teal-500 hover:bg-teal-600 text-white font-bold my-2 py-2 px-4 rounded inline-flex items-center" onclick="window.open('{{$photo->world_link}}') " rel="noopener noreferrer" target="_blank">VRChat サイトへ</button>
                    @endisset

                    @if (Auth::user()->id == $photo->user_id)  <!-- delete button -->
                        <form method="post" onsubmit="return confirm('本当に削除しますか？')" action="{{route('photo.destroy', $photo)}}" class="flex-2">
                            @csrf
                            @method('delete')
                            <button class="flex text-white bg-red-700 border-0 py-2 px-2 focus:outline-none hover:bg-red-600 rounded">削除 delete</button>    
                        </form>
                    @endif
                </div>  
            @endforeach
        </div>

        <!-- Photo Swipe -->
        <script type="module">
            import PhotoSwipeLightbox from "https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.2.2/photoswipe-lightbox.esm.min.js";
            const lightbox = new PhotoSwipeLightbox({
                gallery: "#photoGallery",
                children: "a",
                pswpModule: () =>
                import(
                    "https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.2.2/photoswipe.esm.min.js"
                ),
                allowPanToNext: true,
                padding:{ top: 10, bottom: 20, left: 50, right: 50 },
            });
            lightbox.init();
        </script>
    </div>
</x-app-layout>


