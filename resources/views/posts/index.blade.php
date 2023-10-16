<x-app-layout>
    <div class="container max-w-5xl mx-auto px-4 md:px-12 pb-3 mt-3 break-words">

<!-- 変えてみたとこ -->
<body>
    

<div class="w-full m-0 p-0 bg-cover bg-bottom">
			<div class="container max-w-4xl mx-auto pt-16 md:pt-32 text-center break-normal">
				<!--Title-->
					<p class="font-extrabold text-3xl md:text-5xl text-green">
					    GhbB Urs <br>[Guest house Bulletin board YOURS]
 					</p>
					<p class="text-xl md:text-xl text-gray-500">ゲストハウス情報を共有しよう✨</p>
                    <img src="{{ asset('images/プレゼンテーション1.jpg') }}" class="bg-cover mt-8 md:container md:mx-auto">
                    <br>

                <h1> Ecoな検索エンジンの紹介🌳</h1>
                <br>
                <p>Ecosia(エコジア)
                <br>
                あなたのChange Challengeは？
                <br>
                毎日のインターネット検索に、環境保護にコミットするサーチエンジンEcosia（エコジア）を使うこと。検索するだけで植樹に貢献できるんです！
                <br>
                <a href="https://www.ecosia.org/" class="underline hover:text-blue-600" target="_blank">A better planet with every search</a>
                </p>
                <br>
                    <img src="{{ asset('images/balderschwang-447187_640.jpg') }}" class="md:mx-auto">
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
