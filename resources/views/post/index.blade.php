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
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">どこいく？🤔<br></h2>
                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">World wish list: Where shall we go today?</p>
            </div>
            <!-- text - end -->

            <!-- Search form -->
            <div class="mb-10 md:mb-16">
                <form class="w-full max-w-sm" method="GET" action="{{ route('post.index') }}">
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-2/5">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                ワールド名<br>Name
                            </label>
                        </div>
                        <div class="md:w-3/5">
                            <input class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" type="search_body" name="search_body" placeholder="検索ワード Query" value="@if (isset($search_word)) {{ $search_word }} @endif">
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-2/5">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                ワールド分類<br>Category
                            </label>
                        </div>
                        <div class="md:w-3/5">
                            <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" type="search_tag" name="search_tag">
                                <option value=""></option>
                                <option value="未設定 Undefined">未設定 Undefined</option>
                                <option value="景観 Outdoor">景観 Outdoor</option>
                                <option value="ハウス Indoor">ハウス Indoor</option>
                                <option value="ゲーム Game">ゲーム Game</option>
                                <option value="ホラー Horror">ホラー Horror</option>
                                <option value="イベント/展示 Event/Display">イベント/展示 Event/Display</option>
                                <option value="作業 Workplace">作業 Workplace</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:flex md:items-center">
                        <div class="md:w-2/5"></div>
                        <div class="md:w-3/5">
                            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                検索<br>Search
                            </button>
                            <button class="shadow bg-gray-400 hover:bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                <a href="{{ route('post.index') }}">
                                    クリア<br>Cancel
                                </a>
                            </button>
                        </div>
                    </div>
                </form>

               



                <!--form method="GET" action="{{ route('post.index') }}" class="w-full max-w-sm mx-auto">
                    <div class="flex items-center border-b border-teal-500 py-2">
                        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="search_body" name="search_body" placeholder="検索ワード Query" aria-label="Full name" value="@if (isset($search_word)) {{ $search_word }} @endif">
                        <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                            検索<br>Search
                        </button>
                        <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
                            <a href="{{ route('post.index') }}">
                                クリア<br>Cancel
                            </a>
                        </button>
                    </div>
                </form-->

                
            </div>
            <!-- Search form end -->

            <div class='py-4'>
                {{$posts->onEachSide(5)->links()}}
            </div>
            <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                @foreach($posts as $post)
                <!-- article - start -->
                    <div class="flex flex-col overflow-hidden rounded-lg border bg-white">
                        <a href="{{route('post.show', $post)}}" class="group relative block h-48 overflow-hidden bg-gray-100 md:h-64">
                        <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                        </a>

                        <div class="flex flex-1 flex-col p-4 sm:p-6">
                            <h2 class="mb-2 text-lg font-semibold text-gray-800">
                            <a href="#" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{\Illuminate\Support\Str::limit($post->title, 100, '...')}}</a>
                        </h2>

                        <p class="mb-8 text-gray-500">{{\Illuminate\Support\Str::limit($post->body, 100, '...')}}</p>

                        <div class="mt-auto flex items-end justify-between">
                            <div class="flex items-center gap-2">
                                <div class="h-10 w-10 shrink-0 overflow-hidden rounded-full bg-gray-100">
                                    <img src="https://images.unsplash.com/photo-1611898872015-0571a9e38375?auto=format&q=75&fit=crop&w=64" loading="lazy" alt="Photo by Brock Wegner" class="h-full w-full object-cover object-center" />
                                </div>

                                <div>
                                    <span class="block text-indigo-500">{{$post->user->name??'Unknown'}}</span>
                                    <span class="block text-sm text-gray-400">{{$post->created_at}}</span>
                                </div>
                            </div>

                            <span class="rounded border px-2 py-1 text-sm text-gray-500">{{$post->tag}}</span>
                        </div>
                        </div>
                    </div>
                <!-- article - end -->
                @endforeach  
            </div>
            <div class='py-4'>
                {{$posts->onEachSide(5)->links()}}
            </div>
        </div>
    </div>    
</x-app-layout>
