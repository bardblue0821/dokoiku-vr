<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Dokoiku VR - {{$user->name}}</title>
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
  name="users"
  content="users"
/>

<x-app-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl md:px-8 px-4">
            <!-- latest image -->
            <div class="h-1/6 lg:h-1/4 flex justify-center">
                <div class="h-full w-full overflow-hidden rounded rounded-lg bg-gradient-to-b from-teal-500 to-teal-200">
                    @isset($user->header)
                        <img src="{{'/storage/'.$user->header}}" alt="Your Image" class="w-full h-full object-cover object-center">
                    @endisset
                </div>
            </div>
            <!-- icon -->
            <div class="flex mb-8 px-8 items-end">
                <div class="-mt-12 lg:h-36 lg:w-36 h-24 w-24 shrink-0 overflow-hidden rounded-full bg-gray-100">
                    @isset($user->icon)
                        <img src="{{'/storage/'.$user->icon}}" loading="lazy" alt="Photo by Brock Wegner" class="h-full w-full object-cover object-center" />
                    @else
                        <img src="/img/icon/noicon.png" loading="lazy" alt="Photo by Brock Wegner" class="h-full w-full object-cover object-center" />
                    @endisset
                </div>
                <h2 class="lg:pl-8 lg:pb-6 lg:text-4xl  pl-4 text-xl   font-bold text-gray-800">{{$user->name}}</h2>
                <!--p  class="lg:pl-8 lg:pb-6 lg:text-base pl-4 text-sm   font-bold text-gray-500">フォロー: nan</p>
                <p  class="lg:pl-6 lg:pb-6 lg:text-base pl-4 text-sm   font-bold text-gray-500">フォロワー: nan</p-->
            </div>

            <div class="flex pt-4">
                <div class="flex items-center justify-center mt-2 ml-2 hover:mt-0 hover:bg-orange-300 duration-300 px-4 bg-gray-100        rounded-t"><a href="{{ route('users.show', ['id' => $user->id, 'info' => 'posted_world']) }}">    <div class="lg:text-base text-sm text-gray-500 font-bold items-center justify-center px-2 py-2">投稿ワールド: {{$posts_N}}</div></a></div>
                <div class="flex items-center justify-center mt-2 ml-2 hover:mt-0 hover:bg-orange-300 duration-300 px-4 bg-gray-100 border rounded-t"><a href="{{ route('users.show', ['id' => $user->id, 'info' => 'wannavisit_world']) }}"><div class="lg:text-base text-sm text-gray-500 font-bold items-center justify-center px-2 py-2">行きたいワールド: {{$wannavisits_N}}</div></a></div>
                <div class="flex items-center justify-center mt-2 ml-2 hover:mt-0 hover:bg-orange-300 duration-300 px-4 bg-gray-100 border rounded-t"><a href="{{ route('users.show', ['id' => $user->id, 'info' => 'visited_world']) }}">   <div class="lg:text-base text-sm text-gray-500 font-bold items-center justify-center px-2 py-2">行ったワールド: {{$visiteds_N}}</div></a></div>
                <div class="flex items-center justify-center mt-2 ml-2 hover:mt-0                     duration-300 px-4 bg-teal-400 border rounded-t"><a href="{{ route('users.show', ['id' => $user->id, 'info' => 'posted_photo']) }}">    <div class="lg:text-base text-sm text-white    font-bold items-center justify-center px-2 py-2">写真: {{$photos_N}}</div></a></div>
                <!--div class="flex items-center justify-center mt-2 ml-2 hover:mt-0 hover:bg-orange-300 duration-300 px-4 bg-gray-100 border rounded-t"><div class="lg:text-base text-sm text-gray-500 font-bold items-center justify-center px-2 py-2">ノート: nan</div></div-->
            </div>

            <!-- posted photo -->
            <div class="w-full border-t border-teal-400 pt-6 px-2">
                <div class='mx-auto max-w-screen-2xl px-4 md:px-8 py-4'>
                    {{$photos->onEachSide(5)->links()}}
                </div>

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
                                    {!! nl2br(e(\Illuminate\Support\Str::limit($photo->body, 400, '...'))) !!}
                                @else
                                    <div class="text-gray-400 text-base">No comment...</div>
                                    
                                @endisset
                            </div>
                            <div class="gallery" id="photoGallery">  <!-- photo -->
                                @if($photo->number == 1) <!-- 1 photo view-->
                                    <div class="grid gap-0 grid-cols-1">
                                        @isset($photo->link1)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link1}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size1x}}" data-pswp-height="{{$photo->size1y}}" target="_blank">
                                                    <img src="/{{$photo->link1}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset
                                        
                                        @isset($photo->link2)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link2}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size2x}}" data-pswp-height="{{$photo->size2y}}" target="_blank">
                                                    <img src="/{{$photo->link2}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link3)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link3}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size3x}}" data-pswp-height="{{$photo->size3y}}" target="_blank">
                                                    <img src="/{{$photo->link3}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link4)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link4}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size4x}}" data-pswp-height="{{$photo->size4y}}" target="_blank">
                                                    <img src="/{{$photo->link4}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link5)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link5}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size5x}}" data-pswp-height="{{$photo->size5y}}" target="_blank">
                                                    <img src="/{{$photo->link5}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link6)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link6}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size6x}}" data-pswp-height="{{$photo->size6y}}" target="_blank">
                                                    <img src="/{{$photo->link6}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link7)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link7}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size7x}}" data-pswp-height="{{$photo->size7y}}" target="_blank">
                                                    <img src="/{{$photo->link7}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link8)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link8}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size8x}}" data-pswp-height="{{$photo->size8y}}" target="_blank">
                                                    <img src="/{{$photo->link8}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link9)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link9}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size9x}}" data-pswp-height="{{$photo->size9y}}" target="_blank">
                                                    <img src="/{{$photo->link9}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset
                                    </div>
                                @elseif($photo->number > 1 && $photo->number <= 4)  <!-- 4 photos view-->
                                    <div class="grid gap-0 grid-cols-2">
                                        @isset($photo->link1)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link1}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size1x}}" data-pswp-height="{{$photo->size1y}}" target="_blank">
                                                    <img src="/{{$photo->link1}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset
                                        
                                        @isset($photo->link2)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link2}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size2x}}" data-pswp-height="{{$photo->size2y}}" target="_blank">
                                                    <img src="/{{$photo->link2}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link3)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link3}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size3x}}" data-pswp-height="{{$photo->size3y}}" target="_blank">
                                                    <img src="/{{$photo->link3}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link4)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link4}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size4x}}" data-pswp-height="{{$photo->size4y}}" target="_blank">
                                                    <img src="/{{$photo->link4}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link5)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link5}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size5x}}" data-pswp-height="{{$photo->size5y}}" target="_blank">
                                                    <img src="/{{$photo->link5}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link6)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link6}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size6x}}" data-pswp-height="{{$photo->size6y}}" target="_blank">
                                                    <img src="/{{$photo->link6}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link7)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link7}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size7x}}" data-pswp-height="{{$photo->size7y}}" target="_blank">
                                                    <img src="/{{$photo->link7}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link8)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link8}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size8x}}" data-pswp-height="{{$photo->size8y}}" target="_blank">
                                                    <img src="/{{$photo->link8}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link9)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link9}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size9x}}" data-pswp-height="{{$photo->size9y}}" target="_blank">
                                                    <img src="/{{$photo->link9}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset
                                    </div>
                                @elseif($photo->number > 4)  <!-- 9 photos view-->
                                    <div class="grid gap-0 grid-cols-3">
                                        @isset($photo->link1)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link1}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size1x}}" data-pswp-height="{{$photo->size1y}}" target="_blank">
                                                    <img src="/{{$photo->link1}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset
                                        
                                        @isset($photo->link2)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link2}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size2x}}" data-pswp-height="{{$photo->size2y}}" target="_blank">
                                                    <img src="/{{$photo->link2}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link3)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link3}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size3x}}" data-pswp-height="{{$photo->size3y}}" target="_blank">
                                                    <img src="/{{$photo->link3}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link4)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link4}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size4x}}" data-pswp-height="{{$photo->size4y}}" target="_blank">
                                                    <img src="/{{$photo->link4}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link5)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link5}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size5x}}" data-pswp-height="{{$photo->size5y}}" target="_blank">
                                                    <img src="/{{$photo->link5}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link6)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link6}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size6x}}" data-pswp-height="{{$photo->size6y}}" target="_blank">
                                                    <img src="/{{$photo->link6}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link7)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link7}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size7x}}" data-pswp-height="{{$photo->size7y}}" target="_blank">
                                                    <img src="/{{$photo->link7}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link8)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link8}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size8x}}" data-pswp-height="{{$photo->size8y}}" target="_blank">
                                                    <img src="/{{$photo->link8}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                                </a>
                                            </div>
                                        @endisset

                                        @isset($photo->link9)
                                            <div class="flex flex-col overflow-hidden border bg-white">
                                                <a href="/{{$photo->link9}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size9x}}" data-pswp-height="{{$photo->size9y}}" target="_blank">
                                                    <img src="/{{$photo->link9}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
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

                            <div class="flex justify-center">
                                @isset($photo->world_link)  <!-- world button -->
                                    <button class="bg-teal-500 hover:bg-teal-600 text-white font-bold my-2 py-2 px-4 rounded inline-flex items-center" onclick="window.open('{{$photo->world_link}}') " rel="noopener noreferrer" target="_blank">VRChat サイトへ</button>
                                @endisset
                            </div>
                                
                            @if (Auth::user()->id == $photo->user_id)
                                <form method="post" onsubmit="return confirm('本当に削除しますか？')" action="{{route('photo.destroy', $photo)}}" class="flex-2">
                                    @csrf
                                    @method('delete')
                                    <button class="flex text-xs text-white bg-red-700 border-0 my-2 py-2 px-2 focus:outline-none hover:bg-red-600 rounded">削除</button>    
                                </form>
                            @endif
                        </div>  
                    @endforeach
                </div>

                <div class='mx-auto max-w-screen-2xl px-4 md:px-8 py-4'>
                    {{$photos->onEachSide(5)->links()}}
                </div>
            </div>
        </div>
    </div>   
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
</x-app-layout>
