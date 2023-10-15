<x-app-layout>
    <div class="container max-w-5xl mx-auto px-4 md:px-12 pb-3 mt-3 break-words">

    <body>
        <div id="home" class="big-bg">
            <h2 class="page-title text-5xl text-left my-12 font-bold">ゲストハウス掲示板サイト<h2>
            <img src="{{ asset('images/balderschwang-447187_640.jpg') }}" class="bg-cover mt-8">
            <div class="home-content wrapper">
            </div>
        </div>
    </body>

        <x-flash-message :message="session('notice')" />
        {{-- 終了タグはなし 文字列として変数を渡す --}}
        <x-validation-errors :errors="$errors" />

        <div class="flex flex-wrap -mx-1 lg:-mx-4 mb-4">
            @foreach ($posts as $post)
                <article class="w-full px-4 md:w-1/2 text-xl text-gray-800 leading-normal">
                    <a href="{{ route('posts.show', $post) }}">
                        <h2
                            class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words">
                            {{ $post->title }}</h2>
                        <h3>{{ $post->user->name }}</h3>
                        <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                            <span
                                class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->created_at ? 'NEW' : '' }}</span>
                            {{ $post->created_at }}
                        </p>
                        <img class="w-full mb-2" src="{{ $post->image_url }}" alt="">
                        <p class="text-gray-700 text-base">{{ Str::limit($post->body, 50) }}</p>
                    </a>
                </article>
            @endforeach
        </div>
        {{ $posts->links() }}
    </div>
</x-app-layout>
