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
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{Auth::user()->name}} さん、どこ行きたい？🙌</h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Please let me know where you wanna visit!</p>
            </div>
            <!-- text - end -->

            <!-- form - start -->
            <x-message :message="session('message')" />
            <form method='post' action="{{route('post.store')}}" enctype='multipart/form-data' class="mx-auto grid max-w-screen-md gap-8 sm:grid-cols-3">    
                @csrf
                <div class="sm:col-span-3">
                    <p class="text-xl font-bold text-teal-500">VRChat サイトの URL <span class="text-base text-orange-400">(必須)</span></p>
                    <p class="mb-1 text-base text-gray-500">World URL (Required)</p>
                    <p class="mb-2 text-sm text-gray-500 ">🙅‍♂️制作者があなた以外のプライベートワールドは投稿しないでください</p>
                    <input name="link" id='link' value="{{old('link')}}" placeholder="https://vrchat.com/home/world/wrld_xxxxxxxx" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    <x-input-error :messages="$errors->get('link')" class="mt-2" />
                </div>

                <div class="sm:col-span-1">
                    <p class="text-xl font-bold text-teal-500">カテゴリー <span class="text-base text-gray-400">(任意)</span></p>
                    <p class="mb-2 text-base text-gray-500">Category (Optional)</p>
                    <select class="category_id" id="category_id" name="category_id" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="sm:col-span-3">
                    <p class="text-xl font-bold text-teal-500">情報 <span class="text-base text-gray-400">(任意)</span></p>
                    <p class="mb-2 text-base text-gray-500">Information (Optional)</p>
                    <div class="mb-1">
                        <input type="checkbox" id="ichioshi" name="ichioshi" value="1"/>
                        <label class="mr-2 text-gray-700" for="ichioshi">イチ押し✨</label>
                        <input type="checkbox" id="quest" name="quest" value="1"/>
                        <label class="mr-2 text-gray-700" for="quest">クエスト対応</label>
                    </div>
                    <div class="mb-1">
                        <input type="checkbox" id="pen" name="pen" value="1"/>
                        <label class="mr-2 text-gray-700" for="pen">ペン</label>
                        <input type="checkbox" id="bed" name="bed" value="1"/>
                        <label class="mr-2 text-gray-700" for="bed">ベッド</label>
                        <input type="checkbox" id="vid" name="vid" value="1"/>
                        <label class="mr-2 text-gray-700" for="vid">ビデオ</label>
                        <input type="checkbox" id="jlog" name="jlog" value="1"/>
                        <label class="mr-2 text-gray-700" for="jlog">ジョインログ</label>
                        <input type="checkbox" id="imgpad" name="imgpad" value="1"/>
                        <label class="mr-2 text-gray-700" for="imgpad">イメージパッド</label>
                    </div>
                    <div>
                        <input type="checkbox" id="heavy" name="heavy" value="1"/>
                        <label class="mr-2 text-gray-700" for="heavy">高負荷</label>
                        <input type="checkbox" id="hardtojoin" name="hardtojoin" value="1"/>
                        <label class="mr-2 text-gray-700" for="hardtojoin">合流難しい</label>
                        <input type="checkbox" id="jumpscare" name="jumpscare" value="1"/>
                        <label class="mr-2 text-gray-700" for="jumpscare">ジャンプスケア</label>
                        <input type="checkbox" id="violence" name="violence" value="1"/>
                        <label class="mr-2 text-gray-700" for="violence">暴力表現</label>
                        <input type="checkbox" id="sexual" name="sexual" value="1"/>
                        <label class="mr-2 text-gray-700" for="sexual">性的表現</label>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <p class="text-xl font-bold text-teal-500">投稿者コメント <span class="text-base text-gray-400">(任意)</span></p>
                    <p class="mb-1 text-base text-gray-500">Comment (Optional)</p>
                    <p class="mb-2 text-sm text-gray-500 ">👍一覧ページで内容を検索できます</p>
                    
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