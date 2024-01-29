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
            <!-- text - end -->

            <!-- Search form >
            <div class="mb-10 md:mb-16">
                <form class="" method="GET" action="{{ route('post.index') }}">
                    <div class="flex mb-8">
                        <div class="mx-auto items-center md:flex md:items-center">
                            <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                ワールド名<br>Name
                            </label>
                            <input class="rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" type="search_body" name="search_body" placeholder="検索ワード Query" value="{{request()->search_body}}">
                        
                            <label class="text-gray-500 font-bold md:text-right ml-4 mb-1 md:mb-0 pr-4 ml:40" for="inline-full-name">
                                ワールド分類<br>Category
                            </label>
                            <select class="appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" type="search_category" name="search_category">
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{request()->search_category == $category->id ? "selected" : "";}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        
                            <label class="text-gray-500 font-bold md:text-right ml-4 mb-1 md:mb-0 pr-4" for="inline-full-name">
                                マイセレクト<br>Selection
                            </label>
                        
                            <select class="appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" type="search_selection" name="search_selection">
                                <option value=""></option>
                                <option value="wannavisit" {{request()->search_selection == "wannavisit" ? "selected" : "";}}>行きたい！ Wannavisit</option>
                                <option value="visited" {{request()->search_selection == "visited" ? "selected" : "";}}>行ったよ！ Visited</option>
                            </select>
                        </div> 
                    </div>

                    <div class="flex">
                        <div class="mx-auto items-center md:flex md:items-center">
                            
                            <button class="mx-4 bg-teal-500 hover:bg-teal-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                検索 Search
                            </button>
                            <button class="mx-4 bg-gray-400 hover:bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                <a href="{{ route('post.index') }}">
                                    クリア Cancel
                                </a>
                            </button>
                            
                        </div>
                    </div>
                </form>
            </div>
            <Search form end -->

            <!-- cards start >
            <div class='py-4'>
                {{$posts->onEachSide(5)->links()}}
            </div>
            <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                @foreach($posts as $post)
                    <div class="flex flex-col overflow-hidden rounded-lg border bg-white">
                        <a href="{{route('post.show', $post)}}" class="group relative block h-48 overflow-hidden bg-gray-100 md:h-64">
                            <img src='{{$post->thumbnail}}' loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                        </a>

                        <div class="flex flex-1 flex-col p-4 sm:p-6">
                            <h2 class="mb-2 text-lg font-semibold text-gray-800">
                            <a href="{{route('post.show', $post)}}" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{\Illuminate\Support\Str::limit($post->title, 100, '...')}}</a>
                        </h2>

                        <p class="mb-8 text-gray-500">{{\Illuminate\Support\Str::limit($post->desc, 100, '...')}}</p>

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

                            <span class="rounded border px-2 py-1 text-sm text-gray-500">{{$post->categories->name}}</span>
                        </div>
                        </div>
                    </div>
                @endforeach  
            </div>
            <div class='py-4'>
                {{$posts->onEachSide(5)->links()}}
            </div>
            < cards end -->
        </div>
    </div>    
</x-app-layout>
