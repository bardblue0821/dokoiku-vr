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
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{Auth::user()->name}}さん、どこいく？🤔<br></h2>
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

                    <div class="flex mb-4 mx-auto justify-center md:flex md:items-center">
                        <input type="checkbox" id="ichioshi" name="ichioshi" value="1" {{request()->ichioshi == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="ichioshi">イチ押し✨</label>
                        <input type="checkbox" id="quest" name="quest" value="1" {{request()->quest == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="quest">クエスト対応</label>
                    </div>
                    <div class="flex mb-4 mx-auto justify-center md:flex md:items-center">
                        <input type="checkbox" id="pen" name="pen" value="1" {{request()->pen == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="pen">ペン</label>
                        <input type="checkbox" id="bed" name="bed" value="1" {{request()->bed == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="bed">ベッド</label>
                        <input type="checkbox" id="vid" name="vid" value="1" {{request()->vid == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="vid">ビデオ</label>
                        <input type="checkbox" id="jlog" name="jlog" value="1" {{request()->jlog == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="jlog">ジョインログ</label>
                        <input type="checkbox" id="imgpad" name="imgpad" value="1" {{request()->imgpad == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="imgpad">イメージパッド</label>
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
                <a href="{{ route('post.create') }}"">
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



            {{--
            <div class='py-4'>
                {{$tech_posts->onEachSide(5)->links()}}
            </div>
            --}}
        </div>
    </div>
</x-app-layout>
