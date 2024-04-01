<html lang="en-US">
    <head>
        <meta charset="utf-8" />
        <title>Dokoiku VR - Photo Post</title>
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
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{Auth::user()->name}} さん、写真を共有しよう！📸</h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Let us share your photo!</p>
            </div>
            <!-- text - end -->

            <!-- form - start -->
            <x-message :message="session('message')" />
            <form method='post' action="{{route('photo.store')}}" enctype='multipart/form-data' class="mx-auto max-w-screen-md">    
                @csrf
                
                <div class="mb-10">
                    <p class="text-xl font-bold text-teal-500">写真 <span class="text-base text-orange-400">(必須)</span></p>
                    <p class="mb-2 text-sm text-gray-500 ">👍グレーのエリアにドラッグ・アンド・ドロップできます</p>
                    
                    <div class="grid grid-cols-3 gap-1 mb-10">
                        <input type="file" name="link1" id="icon1" class="bg-gray-200 grid-cols-2 px-5 py-10" accept="image/*" onchange="setImage">    
                        <input type="file" name="link2" id="icon2" class="bg-gray-200 grid-cols-2 px-5 py-10" accept="image/*" onchange="setImage">    
                        <input type="file" name="link3" id="icon3" class="bg-gray-200 grid-cols-2 px-5 py-10" accept="image/*" onchange="setImage">    
                        <input type="file" name="link4" id="icon4" class="bg-gray-200 grid-cols-2 px-5 py-10" accept="image/*" onchange="setImage">    
                        <input type="file" name="link5" id="icon5" class="bg-gray-200 grid-cols-2 px-5 py-10" accept="image/*" onchange="setImage">    
                        <input type="file" name="link6" id="icon6" class="bg-gray-200 grid-cols-2 px-5 py-10" accept="image/*" onchange="setImage">    
                        <input type="file" name="link7" id="icon7" class="bg-gray-200 grid-cols-2 px-5 py-10" accept="image/*" onchange="setImage">    
                        <input type="file" name="link8" id="icon8" class="bg-gray-200 grid-cols-2 px-5 py-10" accept="image/*" onchange="setImage">    
                        <input type="file" name="link9" id="icon9" class="bg-gray-200 grid-cols-2 px-5 py-10" accept="image/*" onchange="setImage">    
                    </div>

                    <p class="mb-2 text-sm text-gray-500 ">プレビュー</p>
                    <div class="grid grid-cols-3 gap-1">
                        <img id="icon_img_prv1" class="h-25 w-25" src="">
                        <img id="icon_img_prv2" class="h-25 w-25" src="">
                        <img id="icon_img_prv3" class="h-25 w-25" src="">
                        <img id="icon_img_prv4" class="h-25 w-25" src="">
                        <img id="icon_img_prv5" class="h-25 w-25" src="">
                        <img id="icon_img_prv6" class="h-25 w-25" src="">
                        <img id="icon_img_prv7" class="h-25 w-25" src="">
                        <img id="icon_img_prv8" class="h-25 w-25" src="">
                        <img id="icon_img_prv9" class="h-25 w-25" src="">
                    </div>

                    <!-- JS: image preview  -->
                    <script>
                        $('#icon1').on('change', function (ev) {
                            const reader = new FileReader();
                            const fileName = ev.target.files[0].name;
                            reader.onload = function (ev) {$('#icon_img_prv1').attr('src', ev.target.result);}
                            reader.readAsDataURL(this.files[0]);
                        })
                    </script>
                    <script>
                        $('#icon2').on('change', function (ev) {
                            const reader = new FileReader();
                            const fileName = ev.target.files[0].name;
                            reader.onload = function (ev) {$('#icon_img_prv2').attr('src', ev.target.result);}
                            reader.readAsDataURL(this.files[0]);
                        })
                    </script>
                    <script>
                        $('#icon3').on('change', function (ev) {
                            const reader = new FileReader();
                            const fileName = ev.target.files[0].name;
                            reader.onload = function (ev) {$('#icon_img_prv3').attr('src', ev.target.result);}
                            reader.readAsDataURL(this.files[0]);
                        })
                    </script>
                    <script>
                        $('#icon4').on('change', function (ev) {
                            const reader = new FileReader();
                            const fileName = ev.target.files[0].name;
                            reader.onload = function (ev) {$('#icon_img_prv4').attr('src', ev.target.result);}
                            reader.readAsDataURL(this.files[0]);
                        })
                    </script>
                    <script>
                        $('#icon5').on('change', function (ev) {
                            const reader = new FileReader();
                            const fileName = ev.target.files[0].name;
                            reader.onload = function (ev) {$('#icon_img_prv5').attr('src', ev.target.result);}
                            reader.readAsDataURL(this.files[0]);
                        })
                    </script>
                    <script>
                        $('#icon6').on('change', function (ev) {
                            const reader = new FileReader();
                            const fileName = ev.target.files[0].name;
                            reader.onload = function (ev) {$('#icon_img_prv6').attr('src', ev.target.result);}
                            reader.readAsDataURL(this.files[0]);
                        })
                    </script>
                    <script>
                        $('#icon7').on('change', function (ev) {
                            const reader = new FileReader();
                            const fileName = ev.target.files[0].name;
                            reader.onload = function (ev) {$('#icon_img_prv7').attr('src', ev.target.result);}
                            reader.readAsDataURL(this.files[0]);
                        })
                    </script>
                    <script>
                        $('#icon8').on('change', function (ev) {
                            const reader = new FileReader();
                            const fileName = ev.target.files[0].name;
                            reader.onload = function (ev) {$('#icon_img_prv8').attr('src', ev.target.result);}
                            reader.readAsDataURL(this.files[0]);
                        })
                    </script>
                    <script>
                        $('#icon9').on('change', function (ev) {
                            const reader = new FileReader();
                            const fileName = ev.target.files[0].name;
                            reader.onload = function (ev) {$('#icon_img_prv9').attr('src', ev.target.result);}
                            reader.readAsDataURL(this.files[0]);
                        })
                    </script>

                    <!-- JS: save default path -->
                    <script>
                        // ページ読み込み時にローカルストレージから選択されたパスを取得
                        var defaultPath = localStorage.getItem('selectedPath');

                        // ファイル入力要素にデフォルトのパスを設定
                        document.getElementById('fileInput').value = defaultPath;

                        // ファイルが選択されたときに選択されたパスを保存
                        document.getElementById('fileInput').addEventListener('change', function(event) {
                        var selectedPath = event.target.value;
                        localStorage.setItem('selectedPath', selectedPath);
                        });
                    </script>
                </div>

                <div class="mb-10">
                    <p class="text-xl font-bold text-teal-500">VRChat ワールドリンク <span class="text-base text-gray-400">(任意)</span></p>
                    <p class="mb-2 text-sm text-gray-500 ">このサイトに登録されていない場合は、自動で登録されます。</p>
                    <input name="world_link" id='world_link' value="{{old('world_link')}}" placeholder="https://vrchat.com/home/world/wrld_xxxxxxxx" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    <x-input-error :messages="$errors->get('world_link')" class="mt-2" />
                </div>

                <div class="mb-10">
                    <p class="text-xl font-bold text-teal-500">投稿文 <span class="text-base text-gray-400">(任意)</span></p>
                    <textarea name="body" id='body' class="h-64 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"></textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>

                <div class="flex justify-center mx-auto mb-2">
                    <x-primary-button class="inline-block rounded-lg bg-teal-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-teal-600 transition duration-100 hover:bg-teal-600 focus-visible:ring active:bg-teal-700 md:text-base">送信する</x-primary-button>
                </div>
                
                <div class="flex justify-center mx-auto">
                    <p class="text-sm text-gray-500 "><a href="{{route('term_of_use.index')}}" class="text-teal-500">利用規約<a> 確認してね</p>
                </div>
            </form>
            <!-- form - end -->
        </div>
    </div>
</x-app-layout>

