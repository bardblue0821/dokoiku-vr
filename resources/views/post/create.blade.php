<x-app-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{Auth::user()->name}} さん、どこ行きたい？🙌</h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Please let me know which world you wanna visit!</p>
            </div>
            <!-- text - end -->

            <!-- form - start -->
            <x-message :message="session('message')" />
            <form method='post' action="{{route('post.store')}}" enctype='multipart/form-data' class="mx-auto grid max-w-screen-md gap-8 sm:grid-cols-3">    
                @csrf
                <div class="sm:col-span-3">
                    <label for="link" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">VRChat のリンク (必須)<br>Link to the world description the official VRChat (Required)</label>
                    <input name="link" id='link' value="{{old('link')}}" placeholder="https://vrchat.com/home/world/wrld_xxxxxxxx" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    <x-input-error :messages="$errors->get('link')" class="mt-2" />
                </div>

                <div class="sm:col-span-2">
                    <label for="title" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">ワールド名<br>World name</label>
                    <input name="title" id='title' value="{{old('title')}}" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!--div class="sm:col-span-1">
                    <label for="tag" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">ジャンル*<br>World type*</label>
                    <input name="tag" id='tag' value="{{old('tag')}}" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    <x-input-error :messages="$errors->get('tag')" class="mt-2" />
                </div-->

                <div class="sm:col-span-1">
                    <label for="category_id" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">カテゴリー<br>World category</label>
                    <select class="category_id" id="category_id" name="category_id" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                            
                        <!--option value="未設定 Undefined">未設定 Undefined</option>
                        <option value="景観 Outdoor">景観 Outdoor</option>
                        <option value="ハウス Indoor">ハウス Indoor</option>
                        <option value="ゲーム Game">ゲーム Game</option>
                        <option value="ホラー Horror">ホラー Horror</option>
                        <option value="展示 Display">展示 Display</option>
                        <option value="アバター Avator">アバター Avator</option>
                        <option value="パーティ Celebration">パーティ Celebration</option>
                        <option value="Vket">Vket</option>
                        <option value="作業 Workplace">作業 Workplace</option-->
                    </select>
                </div>

                <div class="sm:col-span-3">
                    <label for="body" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">何したい？などあれば (検索用)<br>Comment</label>
                    <textarea name="body" id='body' class="h-64 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"></textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>

                <!--div class="sm:col-span-3">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    <label for='image' class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像があればぜひ → </label>
                    <input id="image" type="file" name="image">
                </div-->

                <!-- image upload -->
                <div class="sm:col-span-3">
                    <label class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像あれば！</label>
                    <input type="file" name="image">                   
                </div>
                
                
                <div class="flex items-center justify-between sm:col-span-3 mx-auto">
                    <x-primary-button class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">送信 Send</x-primary-button>

                    <!--span class="text-sm text-gray-500">*必須項目 Required</span-->
                </div>

                
            </form>
            <!-- form - end -->
        </div>
    </div>
</x-app-layout>