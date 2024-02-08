<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Dokoiku VR - Photo gallery</title>

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
  name="photo_gallery"
  content="photo_gallery"
/>




<x-app-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif

            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{Auth::user()->name}}さん、いい写真撮れた？🖼<br></h2>
                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Let us share photos!</p>
            </div>

            <!-- post button -->
            <div class="flex justify-center">
                <button class="bg-orange-500 hover:bg-orange-600 text-white font-bold my-2 py-5 px-5 rounded inline-flex items-center">
                    <a href="{{ route('photo.create') }}" class="btn btn-secondary btn-sm">
                        <span class="badge">
                            投稿する Post
                        </span>
                    </a>
                </button>
            </div>
        </div>

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
                                        <a href="{{$photo->link1}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size1x}}" data-pswp-height="{{$photo->size1y}}" target="_blank">
                                            <img src="{{$photo->link1}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset
                                
                                @isset($photo->link2)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link2}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size2x}}" data-pswp-height="{{$photo->size2y}}" target="_blank">
                                            <img src="{{$photo->link2}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link3)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link3}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size3x}}" data-pswp-height="{{$photo->size3y}}" target="_blank">
                                            <img src="{{$photo->link3}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link4)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link4}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size4x}}" data-pswp-height="{{$photo->size4y}}" target="_blank">
                                            <img src="{{$photo->link4}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link5)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link5}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size5x}}" data-pswp-height="{{$photo->size5y}}" target="_blank">
                                            <img src="{{$photo->link5}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link6)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link6}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size6x}}" data-pswp-height="{{$photo->size6y}}" target="_blank">
                                            <img src="{{$photo->link6}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link7)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link7}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size7x}}" data-pswp-height="{{$photo->size7y}}" target="_blank">
                                            <img src="{{$photo->link7}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link8)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link8}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size8x}}" data-pswp-height="{{$photo->size8y}}" target="_blank">
                                            <img src="{{$photo->link8}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link9)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link9}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size9x}}" data-pswp-height="{{$photo->size9y}}" target="_blank">
                                            <img src="{{$photo->link9}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset
                            </div>
                        @elseif($photo->number > 1 && $photo->number <= 4)  <!-- 4 photos view-->
                            <div class="grid gap-0 grid-cols-2">
                                @isset($photo->link1)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link1}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size1x}}" data-pswp-height="{{$photo->size1x}}" target="_blank">
                                            <img src="{{$photo->link1}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset
                                
                                @isset($photo->link2)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link2}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size2x}}" data-pswp-height="{{$photo->size2y}}" target="_blank">
                                            <img src="{{$photo->link2}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link3)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link3}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size3x}}" data-pswp-height="{{$photo->size3y}}" target="_blank">
                                            <img src="{{$photo->link3}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link4)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link4}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size4x}}" data-pswp-height="{{$photo->size4y}}" target="_blank">
                                            <img src="{{$photo->link4}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link5)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link5}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size5x}}" data-pswp-height="{{$photo->size5y}}" target="_blank">
                                            <img src="{{$photo->link5}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link6)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link6}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size6x}}" data-pswp-height="{{$photo->size6y}}" target="_blank">
                                            <img src="{{$photo->link6}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link7)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link7}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size7x}}" data-pswp-height="{{$photo->size7y}}" target="_blank">
                                            <img src="{{$photo->link7}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link8)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link8}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size8x}}" data-pswp-height="{{$photo->size8y}}" target="_blank">
                                            <img src="{{$photo->link8}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link9)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link9}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size9x}}" data-pswp-height="{{$photo->size9y}}" target="_blank">
                                            <img src="{{$photo->link9}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset
                            </div>
                        @elseif($photo->number > 4)  <!-- 9 photos view-->
                            <div class="grid gap-0 grid-cols-3">
                                @isset($photo->link1)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link1}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size1x}}" data-pswp-height="{{$photo->size1y}}" target="_blank">
                                            <img src="{{$photo->link1}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset
                                
                                @isset($photo->link2)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link2}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size2x}}" data-pswp-height="{{$photo->size2y}}" target="_blank">
                                            <img src="{{$photo->link2}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link3)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link3}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size3x}}" data-pswp-height="{{$photo->size3y}}" target="_blank">
                                            <img src="{{$photo->link3}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link4)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link4}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size4x}}" data-pswp-height="{{$photo->size4y}}" target="_blank">
                                            <img src="{{$photo->link4}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link5)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link5}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size5x}}" data-pswp-height="{{$photo->size5y}}" target="_blank">
                                            <img src="{{$photo->link5}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link6)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link6}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size6x}}" data-pswp-height="{{$photo->size6y}}" target="_blank">
                                            <img src="{{$photo->link6}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link7)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link7}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size7x}}" data-pswp-height="{{$photo->size7y}}" target="_blank">
                                            <img src="{{$photo->link7}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link8)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link8}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size8x}}" data-pswp-height="{{$photo->size8y}}" target="_blank">
                                            <img src="{{$photo->link8}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                        </a>
                                    </div>
                                @endisset

                                @isset($photo->link9)
                                    <div class="flex flex-col overflow-hidden border bg-white">
                                        <a href="{{$photo->link9}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="{{$photo->size9x}}" data-pswp-height="{{$photo->size9y}}" target="_blank">
                                            <img src="{{$photo->link9}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
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
                            <button class="flex text-xs text-white bg-red-700 border-0 my-2 py-2 px-2 focus:outline-none hover:bg-red-600 rounded">削除 delete</button>    
                        </form>
                    @endif
                </div>  
            @endforeach
        </div>

        <div class='mx-auto max-w-screen-2xl px-4 md:px-8 py-4'>
            {{$photos->onEachSide(5)->links()}}
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
