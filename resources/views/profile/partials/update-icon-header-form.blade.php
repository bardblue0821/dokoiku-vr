<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            アイコン・ヘッダー画像
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            プロフィール画面のアイコンとヘッダー画像を更新すする。
        </p>
    </header>

    <div class="mt-6">
        <div>
            <x-message :message="session('message')" />
            <!-- icon -->
            <label class="block font-medium text-sm text-gray-700">アイコン画像</label>
            
            <form method='post' action="{{route('profile.updateicon', Auth::user()->id)}}" enctype='multipart/form-data' class="mx-auto max-w-screen-md">    
                @csrf
                
                <div class="flex">
                    <div class="mb-10">
                        <input type="file" name="icon" id="icon" class="border-dashed border-2 rounded border-gray-300 bg-gray-100 grid-cols-2 px-5 py-10 h-25" accept="image/*" onchange="setImage">    
                    </div>

                    <div class="ml-4">
                        <p class="text-sm text-gray-500">プレビュー</p>
                        <img id="icon_img_prv" class="h-20 w-25" src="{{old('icon')}}">
                    </div>

                    <!-- JS: image preview  -->
                    <script>
                        $('#icon').on('change', function (ev) {
                            const reader = new FileReader();
                            const fileName = ev.target.files[0].name;
                            reader.onload = function (ev) {$('#icon_img_prv').attr('src', ev.target.result);}
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

                <div class="flex items-center gap-4 mb-10">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
            
            <!-- header -->
            <label class="block font-medium text-sm text-gray-700">ヘッダー画像</label>
            <form method='post' action="{{route('profile.updateheader', Auth::user()->id)}}" enctype='multipart/form-data' class="mx-auto max-w-screen-md">    
                @csrf
                
                <div class="flex">
                    <div class="mb-10">
                        <input type="file" name="header" id="header" class="border-dashed border-2 rounded border-gray-300 bg-gray-100 grid-cols-2 px-5 py-10 h-25" accept="image/*" onchange="setImage">    
                    </div>

                    <div class="ml-4">
                        <p class="text-sm text-gray-500">プレビュー</p>
                        <img id="header_img_prv" class="h-20 w-25" src="{{old('header')}}">
                    </div>

                    <!-- JS: image preview  -->
                    <script>
                        $('#header').on('change', function (ev) {
                            const reader = new FileReader();
                            const fileName = ev.target.files[0].name;
                            reader.onload = function (ev) {$('#header_img_prv').attr('src', ev.target.result);}
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

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </form>
</section>
