<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Dokoiku VR - {{$post->title}}</title>
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
  content={{$post->title}}
/>

<x-app-layout>
    <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="min-h-96 relative flex flex-1 shrink-0 items-center justify-center overflow-hidden bg-gray-100 py-16 md:py-20 xl:py-36">
                <!-- image -->
                @isset($post->image)
                    <img alt="{{$post->title}}" src="{{$post->title}}" loading="lazy" class="absolute inset-0 h-full w-full object-cover object-center" />
                    <div class="absolute inset-0  bg-gray-600 mix-blend-multiply"></div>
                @else
                    <div class="absolute inset-0 bg-gradient-to-b from-blue-700 to-indigo-400 mix-blend-multiply"></div>
                @endisset
                <!-- overlay-->


                <!-- text -->
                <div class="relative flex flex-col items-center">
                    <div class="m-4 h-16 w-16 sm:h-20 sm:w-20 shrink-0 overflow-hidden rounded-full bg-white">
                        @isset($post->user->icon)
                            <a href="{{ route('users.show', ['id' => $post->user->id, 'info' => 'posted_world']) }}"><img src="{{'/storage/'.$post->user->icon}}" loading="lazy" alt="Photo by Brock Wegner" class="h-full w-full object-cover object-center" /></a>
                        @else
                            <a href="{{ route('users.show', ['id' => $post->user->id, 'info' => 'posted_world']) }}"><img src="/img/icon/noicon.png" loading="lazy" alt="Photo by Brock Wegner" class="h-full w-full object-cover object-center" /></a>
                        @endisset
                    </div>
                    <h1 class="m-3 px-20 text-center text-xl font-bold text-white sm:text-2xl md:m-4 md:text-3xl">{{$post->title}}</h1>
                    <div class="h-10">
                        <p  class="mb-3 sm:text-lg md:mb-4 text-center text-base text-white md:text-xl">{{$post->user->name}}</p>
                    </div>

                    <div class="flex">
                        <p  class="m-1 text-center text-sm text-white sm:text-base md:m-1 md:text-base">作成日:{{$post->created_at}}</p>
                        <p  class="m-1 text-center text-sm text-white sm:text-base md:m-1 md:text-base">更新日:{{$post->updated_at}}</p>
                    </div>

                    <div class="flex py-4">
                        @if (Auth::user()->id == $post->user_id)
                            <a href="{{route('post.edit', $post)}}">
                                <button class="flex text-sm font-bold text-gray-400 bg-opacity-100 border-2 border-gray-400 py-1 px-4 hover:bg-gray-400 hover:text-white rounded">編集</button>
                            </a>

                            <form method="post" onsubmit="return confirm('本当に削除しますか？')" action="{{route('post.destroy', $post)}}" class="flex-2">
                                @csrf
                                @method('delete')
                                <button class="ml-2 flex text-sm font-bold text-red-400 bg-opacity-100 border-2 border-red-400 py-1 px-4 hover:bg-red-700 hover:border-red-700 hover:text-white rounded">削除</button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-md px-4 md:px-8">


            <p class="mb-6 text-gray-500 sm:text-lg md:mb-8">
                {{$post->body}}
            </p>
        </div>
    </div>


</x-app-layout>


