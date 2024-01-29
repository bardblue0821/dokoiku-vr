<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Dokoiku VR - Photo gallery</title>
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
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{Auth::user()->name}}さん、いい写真が撮れた？🖼<br></h2>
                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg"></p>
            </div>
        </div>

        @foreach($photos as $photo)
            <img src='{{$photo->link1}}' loading="lazy" class=""/>
        @endforeach
    </div>    
</x-app-layout>
