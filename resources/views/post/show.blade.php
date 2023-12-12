<x-app-layout>
    <section class="bg-white text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                    <!--h2 class="text-sm title-font text-gray-500 tracking-widest">BRAND NAME</h2-->
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">{{$post->title}}</h1>
                    <!--div class="flex mb-4">
                        <a class="flex-grow text-indigo-500 border-b-2 border-indigo-500 py-2 text-lg px-1">どんなワールド Description</a>
                        <a class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1">レビュー Reviews</a>
                        <a class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1">Details</a>
                    </div-->
                    <p class="leading-relaxed mb-4">{{$post->body}}</p>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">ジャンル World type</span>
                        <span class="ml-auto text-gray-900">{{$post->tag}}</span>
                    </div>
                    <!--div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">PC/Quest</span>
                        <span class="ml-auto text-gray-900">PC only</span>
                    </div-->
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">記事作成日 Created at</span>
                        <span class="ml-auto text-gray-900">{{$post->created_at}}</span>
                    </div>
                    <!--div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">表示回数 </span>
                        <span class="ml-auto text-gray-900">未実装</span>
                    </div>
                    <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">サイト訪問回数 </span>
                        <span class="ml-auto text-gray-900">未実装</span>
                    </div-->

                    <div class="flex py-4">
                        <!--span class="title-font font-medium text-2xl text-gray-900">$58.00</span-->
                        <button class="flex ml-auto text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded" onclick="window.open('{{$post->link}}') " rel="noopener noreferrer" target="_blank">VRChat サイトへ</button>
                        <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                        </svg>
                        </button>
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
                    </div>
                </div>
                <img alt="{{$post->title}}" class="lg:w-1/2 w-full lg:h-auto h-100 object-cover object-center rounded" src="{{ asset($post->image) }}">
            </div>
        </div>
    </section>    
</x-app-layout>
