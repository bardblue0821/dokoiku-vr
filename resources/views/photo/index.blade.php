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
    <div class="py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{Auth::user()->name}}さん、いい写真が撮れた？🖼<br></h2>
                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg"></p>
            </div>
        </div>

        <div class="mx-auto max-w-screen-2xl px-4 md:px-8 
                    grid gap-5 grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2">
            @foreach($photos as $photo)
                <div class="flex flex-col bg-white rounded-lg border my-2 p-2">
                    <div class="text-teal-500 text-2xl">
                        {{$photo->user->name}}
                    </div>
                    <div class="text-gray-400 text-xs h-auto mb-2">
                        {{$photo->created_at}}
                    </div>
                    <div class="text-gray-600 text-base h-20 mb-2">
                        {{$photo->body}}
                    </div>
                    <div class="gallery" id="photoGallery">
                        <div class="grid gap-0 grid-cols-3">
                            

                            @isset($photo->link1)
                                <div class="flex flex-col overflow-hidden border bg-white">
                                    <a href="{{$photo->link1}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="1000" data-pswp-height="1000" target="_blank">
                                        <img src="{{$photo->link1}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                    </a>
                                </div>
                            @endisset
                            
                            @isset($photo->link2)
                                <div class="flex flex-col overflow-hidden border bg-white">
                                    <a href="{{$photo->link2}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="1388" data-pswp-height="925" target="_blank">
                                        <img src="{{$photo->link2}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                    </a>
                                </div>
                            @endisset

                            @isset($photo->link3)
                                <div class="flex flex-col overflow-hidden border bg-white">
                                    <a href="{{$photo->link3}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="1388" data-pswp-height="925" target="_blank">
                                        <img src="{{$photo->link3}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                    </a>
                                </div>
                            @endisset

                            @isset($photo->link4)
                                <div class="flex flex-col overflow-hidden border bg-white">
                                    <a href="{{$photo->link4}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="1388" data-pswp-height="925" target="_blank">
                                        <img src="{{$photo->link4}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                    </a>
                                </div>
                            @endisset

                            @isset($photo->link5)
                                <div class="flex flex-col overflow-hidden border bg-white">
                                    <a href="{{$photo->link5}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="1388" data-pswp-height="925" target="_blank">
                                        <img src="{{$photo->link5}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                    </a>
                                </div>
                            @endisset

                            @isset($photo->link6)
                                <div class="flex flex-col overflow-hidden border bg-white">
                                    <a href="{{$photo->link6}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="1388" data-pswp-height="925" target="_blank">
                                        <img src="{{$photo->link6}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                    </a>
                                </div>
                            @endisset

                            @isset($photo->link7)
                                <div class="flex flex-col overflow-hidden border bg-white">
                                    <a href="{{$photo->link7}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="1388" data-pswp-height="925" target="_blank">
                                        <img src="{{$photo->link7}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                    </a>
                                </div>
                            @endisset

                            @isset($photo->link8)
                                <div class="flex flex-col overflow-hidden border bg-white">
                                    <a href="{{$photo->link8}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="1388" data-pswp-height="925" target="_blank">
                                        <img src="{{$photo->link8}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                    </a>
                                </div>
                            @endisset

                            @isset($photo->link9)
                                <div class="flex flex-col overflow-hidden border bg-white">
                                    <a href="{{$photo->link9}}" class="group relative block overflow-hidden bg-gray-100" data-pswp-width="1388" data-pswp-height="925" target="_blank">
                                        <img src="{{$photo->link9}}" alt="" loading="lazy" class="aspect-square object-cover object-center transition duration-200 group-hover:scale-110"/>
                                    </a>
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>  
            @endforeach
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
