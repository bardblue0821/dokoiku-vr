<x-app-layout>
    @if(session('message'))
        <div class="text-red-600 font-bold">
            {{session('message')}}
        </div>
    @endif
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">どこいく？🤔<br></h2>
                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">World wish list</p>
            </div>
            <!-- text - end -->

            <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                @foreach($posts as $post)
                <!-- article - start -->
                    <div class="flex flex-col overflow-hidden rounded-lg border bg-white">
                        <a href="{{route('post.show', $post)}}" class="group relative block h-48 overflow-hidden bg-gray-100 md:h-64">
                        <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                        </a>

                        <div class="flex flex-1 flex-col p-4 sm:p-6">
                            <h2 class="mb-2 text-lg font-semibold text-gray-800">
                            <a href="#" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{$post->title}}</a>
                        </h2>

                        <p class="mb-8 text-gray-500">{{$post->body}}</p>

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

                            <span class="rounded border px-2 py-1 text-sm text-gray-500">Article</span>
                        </div>
                        </div>
                    </div>
                <!-- article - end -->
                @endforeach  
            </div>
            {{$posts->onEachSide(5)->links()}}
        </div>
    </div>    
</x-app-layout>
