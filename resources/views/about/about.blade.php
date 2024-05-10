<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Dokoiku VR - About</title>
    <link rel="shortcut icon" href="img/favicon.ico">
  </head>
</html>

<meta
  name="about"
  content="about"
/>

<!--https://flowrift.com/c/full-page/6tdav?view=preview-->

<x-app-layout>  
  <!-- welcome movie -->
  <div class="bg-white pb-10 sm:pb-12 lg:pb-16">
    <div class="relative flex flex-1 shrink-0 items-center justify-center aspect-w-4 aspect-h-3 overflow-hidden bg-gray-100 h-full">
      <!-- image -->
      <video autoplay loop muted class="absolute object-cover w-full h-full">
        <source src="vid/chalo1.mp4" type="video/mp4" />
        Your browser does not support the video tag.
      </video>

      <!-- overlaid gray -->
      <div class="absolute inset-0 bg-gray-400 mix-blend-multiply"></div>

      <!-- text -->
      <div class="absolute flex flex-col">
        <div class="sm:mx-8 lg:justify-start">
          <h1 class="text-white lg:text-8xl md:text-7xl font-bold sm:mb-8 text-5xl mb-4 animate-tracking-in-expand-fwd">Share Experience<br>In VRChat Together.</h1>
          <a href="{{route('post.index')}}" class="inline-block rounded-lg bg-teal-500 lg:px-8 lg:py-2 px-4 py-1 text-center lg:text-lg font-semibold text-white outline-none ring-teal-300 transition duration-100 hover:bg-teal-600 focus-visible:ring active:bg-teal-700">VRChat のワールドを探す</a>
        </div>
      </div>
    </div>
  </div>     
  <!-- hero - start -->
  <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">

    <!-- Share Your Favourite VR World -->
      <section class="flex flex-col justify-between lg:gap-10 gap-4 lg:flex-row lg:mb-20 mb-16">
        <!-- content - start -->
        <div class="flex flex-col justify-center text-center lg:py-12 lg:text-left lg:w-1/2 lg:py-24 lg:order-1">
          <p class="mb-2 font-bold text-teal-500 text:xl lg:mb-4 lg:text-2xl">教えて おすすめ VR 世界</p>
          <h1 class="mb-4 text-4xl font-bold text-black lg:mb-5 lg:text-7xl">Share Your<br>Favourite VR World.</h1>
          <p class="leading-relaxed text-sm font-bold text-gray-500 lg:text-2xl">みんなで行きたいワールド、<br>あなたが行ってよかったワールドを共有しよう！</p>
        </div>
        <!-- content - end -->

        <!-- image - start -->
        <div class="h-96 relative overflow-hidden rounded-lg bg-gray-100 shadow-lg  lg:h-auto lg:w-1/2 lg:order-2 animate-rotate-in-2-cw">
          <img src="/img/about1.jpg" loading="lazy" alt="Share Your Favourite VR World" class="h-full w-full object-cover object-center" />
        </div>
        <!-- image - end -->
      </section>

      <!-- Share Your Owesome photos with us -->
      <section class="flex flex-col justify-between text-center lg:gap-10 gap-4 lg:flex-row lg:mb-20 mb-16">
        <!-- content - start -->
        <div class="flex flex-col justify-center lg:py-12 lg:text-left lg:w-1/2 lg:py-24 lg:order-2">
          <p class="mb-2 font-bold text-teal-500 text:xl lg:mb-4 lg:text-2xl">いい写真撮れた？</p>
          <h1 class="mb-4 text-4xl font-bold text-black lg:mb-5 lg:text-7xl">Share Your Awesome <br> Photos With Us.</h1>
          <p class="leading-relaxed text-sm font-bold text-gray-500 lg:text-2xl">素敵な写真をみんなと共有しよう！</p>
        </div>
        <!-- content - end -->

        <!-- image - start -->
        <div class="h-96 overflow-hidden rounded-lg bg-gray-100 shadow-lg  lg:h-auto lg:w-1/2 lg:order-1">
          <img src="/img/about2.png" loading="lazy" alt="Share Your Awesome Photos With Us" class="h-full w-full object-cover object-center" />
        </div>
        <!-- image - end -->
      </section>

    <!-- Share our knowledge and help each other.-->
    <section class="flex flex-col justify-between text-center lg:gap-10 gap-4 lg:flex-row lg:mb-20 mb-16">
        <!-- content - start -->
        <div class="flex flex-col justify-center lg:py-12 lg:text-left lg:w-1/2 lg:py-24 lg:order-1">
          <p class="mb-2 font-bold text-teal-500 text:xl lg:mb-4 lg:text-2xl">VRChat は助け合い</p>
          <h1 class="mb-4 text-4xl font-bold text-black lg:mb-5 lg:text-7xl">Share Our Knowledge and <br>Help Each Other.</h1>
          <p class="leading-relaxed text-sm font-bold text-gray-500 lg:text-2xl">知識をみんなで集めよう！(実装予定)</p>
        </div>
        <!-- content - end -->

        <!-- image - start -->
        <div class="h-48 relative overflow-hidden rounded-lg bg-gray-100 shadow-lg  lg:h-auto lg:w-1/2 lg:order-2">
          <img src="/img/about3.png" loading="lazy" alt="Share Our Knowledge and Help Each Other" class="h-full w-full object-cover object-center" />
        </div>
        <!-- image - end -->
      </section>
    </div>
  </div>
  <!-- hero - end -->

  {{--<!-- features - start -->
  <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
      <!-- text - start -->
      <div class="mb-10 md:mb-16">
        <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">できること🙌</h2>

        <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">少しずつできる機能を増やしていくよ。いっぱい投稿してくれたらうれしいです！</p>
      </div>
      <!-- text - end -->

      <div class="grid gap-8 sm:grid-cols-2 md:gap-12 xl:grid-cols-3 xl:gap-16">
        <!-- feature - start -->
        <div class="flex gap-4 md:gap-6">
          <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-teal-500 text-white shadow-lg md:h-14 md:w-14 md:rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
            </svg>
          </div>

          <div>
            <h3 class="mb-2 text-lg font-semibold md:text-xl">ワールド投稿</h3>
            <p class="mb-2 text-gray-500">行きたいワールド・行ってよかったワールドを、VRChat公式サイトのリンクを張ることで、みんなに共有しよう！</p>
          </div>
        </div>
        <!-- feature - end -->

        <!-- feature - start -->
        <div class="flex gap-4 md:gap-6">
          <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-teal-500 text-white shadow-lg md:h-14 md:w-14 md:rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
            </svg>
          </div>

          <div>
            <h3 class="mb-2 text-lg font-semibold md:text-xl">ワールド検索</h3>
            <p class="mb-2 text-gray-500">みんなの投稿から、行きたいワールドを検索しよう！行きたいと思ったワールドは「行きたい」ボタンで保存できるよ</p>
          </div>
        </div>
        <!-- feature - end -->

        <!-- feature - start -->
        <div class="flex gap-4 md:gap-6">
          <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-teal-500 text-white shadow-lg md:h-14 md:w-14 md:rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
          </div>

          <div>
            <h3 class="mb-2 text-lg font-semibold md:text-xl">おやすみワールド検索</h3>
            <p class="mb-2 text-gray-500">ペン、ジョインログ、ベッド、動画プレイヤーなどの情報をまとめて、おやすみワールドデータベースを作ろう！</p>
          </div>
        </div>
        <!-- feature - end -->

        <!-- feature - start -->
        <div class="flex gap-4 md:gap-6">
          <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-gray-500 text-white shadow-lg md:h-14 md:w-14 md:rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>

          <div>
            <h3 class="mb-2 text-lg font-semibold md:text-xl">技術投稿(予定)</h3>
            <p class="mb-2 text-gray-500">アバター改変・ワールド制作、VRChatの可能性は無限大…。みんなで知見を共有しよう！</p>
          </div>
        </div>
        <!-- feature - end -->

        <!-- feature - start -->
        <div class="flex gap-4 md:gap-6">
          <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-teal-500 text-white shadow-lg md:h-14 md:w-14 md:rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
          </div>

          <div>
            <h3 class="mb-2 text-lg font-semibold md:text-xl">写真投稿</h3>
            <p class="mb-2 text-gray-500">いい写真撮れた！？みんなと共有して思い出のアルバムを作ろう！</p>
          </div>
        </div>
        <!-- feature - end -->
      </div>
    </div>
  </div>
  <!-- features - end -->--}}


  <!-- stats - start -->
  <div class="bg-white py-6 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 lg:px-8">
      <div class="flex flex-col items-center rounded-lg bg-gray-100 p-4 lg:p-8">
        <!-- text - start -->
        <div class="mb-4 lg:mb-10">
          <h2 class="mb-2 text-center text-2xl font-bold text-gray-800 lg:mb-6 lg:text-4xl">現在の投稿数📜</h2>
          <p class="mx-auto max-w-screen-md font-semibold text-center text-gray-500 text-base lg:text-xl">みんなのおかげで、これだけの投稿があります！</p>
        </div>
        <!-- text - end -->

        <div class="grid grid-cols-2 gap-8 md:grid-cols-4 md:gap-0 md:divide-x"><!-- stat - start -->
          <div class="flex flex-col items-center lg:p-4">
            <div class="text-3xl font-bold text-teal-500 lg:text-6xl">{{$count_post}}</div>
            <div class="text-sm font-semibold lg:text-xl">Worlds</div>
          </div>

          <div class="flex flex-col items-center lg:p-4">
            <div class="text-3xl font-bold text-teal-500 lg:text-6xl">{{$count_user}}</div>
            <div class="text-sm font-semibold lg:text-xl">Contributors</div>
          </div>

          <div class="flex flex-col items-center lg:p-4">
            <div class="text-3xl font-bold text-teal-500 lg:text-6xl">{{$count_wanna_visit}}</div>
            <div class="text-sm font-semibold lg:text-xl">Wanna visits</div>
          </div>

          <div class="flex flex-col items-center lg:p-4">
            <div class="text-3xl font-bold text-teal-500 lg:text-6xl">{{$count_visited}}</div>
            <div class="text-sm font-semibold lg:text-xl">Visited reviews</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- stats - end -->


  {{--<!-- newsletter - start -->
  <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
      <div class="flex flex-col items-center rounded-lg bg-gray-100 p-4 sm:p-8">
        <div class="mb-4 sm:mb-8">
          <h2 class="text-center text-xl font-bold text-teal-500 sm:text-2xl lg:text-3xl">おすすめのワールド 教えてね😋</h2>
          <p class="text-center text-gray-500">下のボタンからワールド検索・投稿画面に飛べるよ。<br>(ログインが必要だよ)</p>
        </div>
        <div class="flex flex-col gap-2.5 sm:flex-row sm:justify-center lg:justify-start">
            <a href="{{route('post.index')}}" class="inline-block rounded-lg bg-teal-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-teal-300 transition duration-100 hover:bg-teal-600 focus-visible:ring active:bg-teal-700 md:text-base">探す</a>

            <a href="{{route('post.create')}}" class="inline-block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-teal-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">投稿する</a>
        </div>
      </div>
    </div>
  </div>
  <!-- newsletter - end -->--}}

<!-- footer - end -->
</x-app-layout>