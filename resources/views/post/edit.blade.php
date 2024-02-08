<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Dokoiku VR - Edit</title>
  </head>
</html>

<meta
  name="edit"
  content="edit"
/>




<x-app-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">編集画面⌨️</h2>
                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Please edit the section you want to edit and press the send button.</p>
            </div>
            <!-- text - end -->

            <!-- form - start -->
            <x-message :message="session('message')" />
            <form method='post' action="{{route('post.update', $post)}}" enctype='multipart/form-data' class="mx-auto grid max-w-screen-md gap-8 sm:grid-cols-3">    
                @csrf
                @method('patch')
                <div class="sm:col-span-3">
                    <p class="text-xl font-bold text-teal-500">VRChat サイトの URL <span class="text-base text-orange-400">(必須)</span></p>
                    <p class="mb-1 text-base text-gray-500">World URL (Required)</p>
                    <p class="text-base text-gray-500">{{old('link', $post->link)}}</p>
                </div>

                <div class="sm:col-span-1">
                    <p class="text-xl font-bold text-teal-500">カテゴリー <span class="text-base text-gray-400">(任意)</span></p>
                    <p class="mb-2 text-base text-gray-500">Category (Optional)</p>
                    <select class="category_id" id="category_id" name="category_id" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" @if($post->categories->name == $category->name) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                    <label for="category_id" class="mb-2 inline-block text-sm text-gray-400 sm:text-base">編集前: {{old('category_id', $post->categories->name)}}</label>
                </div>
                

                <div class="sm:col-span-3">
                    <p class="text-xl font-bold text-teal-500">情報 <span class="text-base text-gray-400">(任意)</span></p>
                    <p class="mb-2 text-base text-gray-500">Information (Optional)</p>
                    <div class="mb-1">
                        <input type="checkbox" id="ichioshi" name="ichioshi" value="1" {{old('ichioshi', $post->ichioshi) ? "checked" : ""}}/>
                        <label class="mr-2 text-gray-700" for="ichioshi">イチ押し✨</label>
                        <input type="checkbox" id="quest" name="quest" value="1" {{old('quest', $post->quest) ? "checked" : ""}}/>
                        <label class="mr-2 text-gray-700" for="quest">クエスト対応</label>
                    </div>
                    <div class="mb-1">
                        <input type="checkbox" id="pen" name="pen" value="1"       {{old('pen', $post->pen) ? "checked" : ""}}/>
                        <label class="mr-2 text-gray-700" for="pen">ペン</label>
                        <input type="checkbox" id="bed" name="bed" value="1"       {{old('bed', $post->bed) ? "checked" : ""}}/>
                        <label class="mr-2 text-gray-700" for="bed">ベッド</label>
                        <input type="checkbox" id="vid" name="vid" value="1"       {{old('vid', $post->vid) ? "checked" : ""}}/>
                        <label class="mr-2 text-gray-700" for="vid">ビデオ</label>
                        <input type="checkbox" id="jlog" name="jlog" value="1"     {{old('jlog', $post->jlog) ? "checked" : ""}}/>
                        <label class="mr-2 text-gray-700" for="jlog">ジョインログ</label>
                        <input type="checkbox" id="imgpad" name="imgpad" value="1" {{old('imgpad', $post->imgpad) ? "checked" : ""}}/>
                        <label class="mr-2 text-gray-700" for="imgpad">イメージパッド</label>
                    </div>
                    <div>
                        <input type="checkbox" id="heavy" name="heavy" value="1" {{old('heavy', $post->heavy) ? "checked" : ""}}/>
                        <label class="mr-2 text-gray-700" for="heavy">高負荷</label>
                        <input type="checkbox" id="hardtojoin" name="hardtojoin" value="1" {{old('hardtojoin', $post->hardtojoin) ? "checked" : ""}}/>
                        <label class="mr-2 text-gray-700" for="hardtojoin">合流難しい</label>
                        <input type="checkbox" id="jumpscare" name="jumpscare" value="1" {{old('jumpscare', $post->jumpscare) ? "checked" : ""}}/>
                        <label class="mr-2 text-gray-700" for="jumpscare">ジャンプスケア</label>
                        <input type="checkbox" id="violence" name="violence" value="1" {{old('violence', $post->violence) ? "checked" : ""}}/>
                        <label class="mr-2 text-gray-700" for="violence">暴力表現</label>
                        <input type="checkbox" id="sexual" name="sexual" value="1" {{old('sexual', $post->sexual) ? "checked" : ""}}/>
                        <label class="mr-2 text-gray-700" for="sexual">性的表現</label>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <p class="text-xl font-bold text-teal-500">投稿者コメント <span class="text-base text-gray-400">(任意)</span></p>
                    <p class="mb-1 text-base text-gray-500">Comment (Optional)</p>
                    <p class="mb-2 text-sm text-gray-500 ">👍一覧ページで内容を検索できます</p>
                    <textarea name="body" id='body' class="h-64 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"></textarea>
                    <label for="body" class="mb-2 inline-block text-sm text-gray-400 sm:text-base">編集前: {{old('body', $post->body)}}</label>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>
                
                <div class="flex items-center justify-between sm:col-span-3 mx-auto">
                    <x-primary-button class="inline-block rounded-lg bg-teal-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-teal-600 transition duration-100 hover:bg-teal-600 focus-visible:ring active:bg-indigo-teal md:text-base">送信 Send</x-primary-button>
                </div>

            </form>
            <!-- form - end -->
        </div>
    </div>
</x-app-layout>

