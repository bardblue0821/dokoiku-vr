<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Dokoiku VR</title>
    <link rel="shortcut icon" href="img/favicon.ico">
  </head>
</html>

<meta
  name="index"
  content="index"
/>

<x-app-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl md:px-8">
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{Auth::user()->name}}さん、みんなの知恵を借りよう！🤖</h2>
            </div>
            <!-- text - end -->

            <!-- Search form -->
            <div class="mb-6 md:mb-6 border rounded px-40 py-6 bg-gray-100">
                <form class="" method="GET" action="{{ route('post.index') }}">
                    <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8 mb-6">
                        <div class="md:mb-0 pr-4 w-60">
                            <div class="w-full text-gray-500 font-bold mb-1 " for="inline-full-name">
                                ワールド名
                            </div>
                            <div>
                                <input class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" type="search_body" name="search_body" placeholder="検索ワード" value="{{request()->search_body}}">
                            </div>
                        </div>
                        <div class="md:mb-0 pr-4 w-60">
                            <div class="w-full text-gray-500 font-bold mb-1" for="inline-full-name">
                                ワールド分類
                            </div>
                            <div>
                                <select class="w-full appearance-none bg-white border border-gray-400 hover:border-gray-500 rounded shadow leading-tight focus:outline-none focus:shadow-outline" type="search_category" name="search_category">
                                    <option value=""></option>
                                    @foreach ($tech_categories as $tech_category)
                                        <option value="{{$tech_category->id}}" {{request()->search_category == $tech_category->id ? "selected" : "";}}>{{$tech_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="md:mb-0 pr-4 w-60">
                            <div class="w-full text-gray-500 font-bold mb-1" for="inline-full-name">
                                マイセレクト
                            </div>
                            <div>
                                <select class="w-full appearance-none bg-white border border-gray-400 hover:border-gray-500 rounded shadow leading-tight focus:outline-none focus:shadow-outline" type="search_selection" name="search_selection">
                                    <option value=""></option>
                                    <option value="wannavisit" {{request()->search_selection == "wannavisit" ? "selected" : "";}}>行きたい！</option>
                                    <option value="visited"    {{request()->search_selection == "visited"    ? "selected" : "";}}>行ったよ！</option>
                                </select>
                            </div>
                        </div>
                        <div class="md:mb-0 pr-4 w-60">
                            <div class="w-full text-gray-500 font-bold mb-1" for="inline-full-name">
                                検索結果順
                            </div>
                            <div>
                                <select class="w-full appearance-none bg-white border border-gray-400 hover:border-gray-500 rounded shadow leading-tight focus:outline-none focus:shadow-outline" type="search_order" name="search_order">
                                    <option value="date_desc" {{request()->search_order == "date_desc" ? "selected" : "date_desc";}}>投稿日 新しい順</option>
                                    <option value="date_asc"  {{request()->search_order == "date_asc"  ? "selected" : "date_desc";}}>投稿日 古い順</option>
                                    <option value="wanna_visits_desc" {{request()->search_order == "wanna_visits_desc" ? "selected" : "date_desc";}}>いきたい数 多い順</option>
                                    <option value="wanna_visits_asc"  {{request()->search_order == "wanna_visits_asc"  ? "selected" : "date_desc";}}>いきたい数 少ない順</option>
                                    <option value="visiteds_desc" {{request()->search_order == "visiteds_desc" ? "selected" : "date_desc";}}>いったよ数 多い順</option>
                                    <option value="visiteds_asc"  {{request()->search_order == "visiteds_asc"  ? "selected" : "date_desc";}}>いったよ数 少ない順</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex mb-4">
                        <div class="mx-auto items-center md:flex md:items-center">
                            <button class="mx-4 bg-teal-500 hover:bg-teal-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-8 rounded" type="submit">
                                検索
                            </button>
                            <a href="{{ route('post.index') }}">
                                <button class="mx-4 bg-gray-400 hover:bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-7 rounded" type="button">
                                    クリア
                                </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Search form end -->

            <div class="flex justify-center">
                <a href="{{ route('tech_board.create') }}"">
                    <button class="bg-orange-500 hover:bg-orange-600 text-white font-bold mx-4 my-2 py-2 px-5 rounded inline-flex items-center">
                        投稿する
                    </button>
                </a>
            </div>

            {{--
            <div class='py-4'>
                {{$tech_posts->onEachSide(5)->links()}}
            </div>
            --}}

            <div class="grid gap-4 sm:grid-cols-1 md:gap-6 lg:grid-cols-2 xl:grid-cols-2 xl:gap-8">
                @foreach ($tech_posts as $tech_post)
                    <!-- article - start -->
                    <div class="flex flex-col overflow-hidden rounded-lg border md:flex-row">
                        <a href="{{route('tech_board.show', $tech_post->id)}}" class="group relative block h-48 w-full shrink-0 self-start overflow-hidden bg-gray-100 md:h-full md:w-32 lg:w-48">
                            @if(0)
                                <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            @else
                                <img src="{{'/storage/'.$tech_post->user->icon}}" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" >
                            @endif
                        </a>

                        <div class="flex flex-col gap-2 p-4 lg:p-6">
                            <span class="text-sm text-gray-400">{{$tech_post->user->name}}</span>

                            <h2 class="text-xl font-bold text-gray-800">
                                <a href="{{route('tech_board.show', $tech_post->id)}}" class="transition duration-100 hover:text-teal-500 active:text-teal-600">{{$tech_post->title}}</a>
                            </h2>
                            <span class="text-sm text-gray-400">{{$tech_post->created_at}}</span>
                        </div>
                    </div>
                    <!-- article - end -->
                @endforeach
            </div>



            {{--
            <div class='py-4'>
                {{$tech_posts->onEachSide(5)->links()}}
            </div>
            --}}
        </div>
    </div>
</x-app-layout>
