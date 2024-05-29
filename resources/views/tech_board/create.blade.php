<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Dokoiku VR - Create Post</title>
    <link rel="shortcut icon" href="img/favicon.ico">
  </head>
</html>

<meta
  name="post"
  content="post"
/>

<x-app-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{ Auth::user()->name }} さん、知恵を教えて！🤖</h2>
            </div>
            <!-- text - end -->

            <!-- form - start -->
            <x-message :message="session('message')" />
            <form method='post' action="{{ route('tech_board.store') }}" enctype='multipart/form-data' class="mx-auto grid max-w-screen-md gap-8 sm:grid-cols-3">
                @csrf
                <div class="sm:col-span-3">
                    <p class="text-xl font-bold text-teal-500">タイトル <span class="text-base text-orange-400">(必須)</span></p>
                    <input name="title" id='title' value="{{ old('title') }}" placeholder="タイトル" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="sm:col-span-1">
                    <p class="text-xl font-bold text-teal-500">カテゴリー <span class="text-base text-orange-400">(必須)</span></p>
                    <select class="tech_category_id" id="tech_category_id" name="tech_category_id" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring">
                        @foreach ($tech_categories as $tech_category)
                            <option value="{{$tech_category->id}}">{{$tech_category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="sm:col-span-3">
                    <p class="text-xl font-bold text-teal-500">本文 <span class="text-base text-orange-400">(必須)</span></p>
                    <textarea name="body" id='body' class="h-64 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"></textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between sm:col-span-3 mx-auto">
                    <x-primary-button class="inline-block rounded-lg bg-teal-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-teal-600 transition duration-100 hover:bg-teal-600 focus-visible:ring active:bg-teal-700 md:text-base">送信</x-primary-button>
                </div>
            </form>
            <!-- form - end -->
        </div>
    </div>
</x-app-layout>
