<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Dokoiku VR - Create Post</title>
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
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{Auth::user()->name}} さん、どこ行ったの？📸</h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Please let me know where you visited!</p>
            </div>
            <!-- text - end -->

            <!-- form - start -->
            <x-message :message="session('message')" />
            <form method='post' action="{{route('photo.store')}}" enctype='multipart/form-data' class="mx-auto grid max-w-screen-md gap-8 sm:grid-cols-3">    
                @csrf

                <div class="sm:col-span-3">
                    <label class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像1</label>
                    <input type="file" name="link1">                   
                </div>

                <div class="sm:col-span-3">
                    <label class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像2</label>
                    <input type="file" name="link2">                   
                </div>

                <div class="sm:col-span-3">
                    <label class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像3</label>
                    <input type="file" name="link3">                   
                </div>

                <div class="sm:col-span-3">
                    <label class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像4</label>
                    <input type="file" name="link4">                   
                </div>

                <div class="sm:col-span-3">
                    <label class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像5</label>
                    <input type="file" name="link5">                   
                </div>

                <div class="sm:col-span-3">
                    <label class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像6</label>
                    <input type="file" name="link6">                   
                </div>

                <div class="sm:col-span-3">
                    <label class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像7</label>
                    <input type="file" name="link7">                   
                </div>

                <div class="sm:col-span-3">
                    <label class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像8</label>
                    <input type="file" name="link8">                   
                </div>

                <div class="sm:col-span-3">
                    <label class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像9</label>
                    <input type="file" name="link9">                   
                </div>

                <div class="sm:col-span-3">
                    <label for="world_link" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">VRChat のリンク (必須)<br>Link to the world description the official VRChat (Required)</label>
                    <input name="world_link" id='world_link' value="{{old('world_link')}}" placeholder="https://vrchat.com/home/world/wrld_xxxxxxxx" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    <x-input-error :messages="$errors->get('world_link')" class="mt-2" />
                </div>

                <div class="sm:col-span-3">
                    <label for="body" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">何したい？などあれば (検索用)<br>Comment</label>
                    <textarea name="body" id='body' class="h-64 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"></textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between sm:col-span-3 mx-auto">
                    <x-primary-button class="inline-block rounded-lg bg-teal-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-teal-600 transition duration-100 hover:bg-teal-600 focus-visible:ring active:bg-teal-700 md:text-base">送信 Send</x-primary-button>
                </div>
            </form>
            <!-- form - end -->
        </div>
    </div>
</x-app-layout>