<x-app-layout>
<div class="h-14 bg-gradient-to-r from-cyan-500 to-blue-500 "></div>

<div class="container max-w-10xl mx-auto px-4 md:px-12 pb-3 mt-3 break-words bg-lime-100">

<!-- 変えてみたとこ -->

<body>

<div class="w-full m-0 p-0 bg-cover bg-bottom">
			<div class="container max-w-4xl mx-auto pt-16 md:pt-32 text-center break-normal mt-6">
				<!--Title-->
					<p class="font-extrabold text-1xl md:text-5xl text-green">
					    GhbB Urs <br>[Guest house Bulletin board YOURS]
                        <br>
 					</p>
                    
					<p class="text-xl md:text-xl text-gray-500">ゲストハウス情報を共有しよう✨</p>
                    <img src="{{ asset('images/START YOUR JOURNEY.jpg') }}" class="bg-cover w-96 mt-5 md:container md:mx-auto">
                    <br>
                    <br>

</div>

        <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <!-- text - start -->
            <div class="mb-10 md:mb-16">
               <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">投稿一覧</h2>
                    <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">あなたの投稿が人の旅・人生を変えちゃうかも✨</p>
            </div>
    <!-- text - end -->

    <div class="bg-gray-100 p-6 rounded-lg">
      
    <x-flash-message :message="session('notice')" />
        {{-- 終了タグはなし 文字列として変数を渡す --}}
        <x-validation-errors :errors="$errors" />

        <div class="flex flex-wrap -mx-1 lg:-mx-4 mb-4">
            @foreach ($posts as $post)
                <article class="w-full px-4 md:w-1/2 text-xl text-gray-800 leading-normal">
                    <a href="{{ route('posts.show', $post) }}">
                        <h3
                            class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words">
                            {{ $post->title }}</h3>
                        <h3>{{ $post->user->name }} さんより🙏</h3>
                        <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                            <span
                                class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->created_at ? 'NEW' : '' }}</span>
                            {{ $post->created_at }}
                        </p>
                        <img class="w-80 mb-2" src="{{ $post->image_url }}" alt="">
                        <br>
                        <p class="text-gray-700 text-base">{{ Str::limit($post->body, 50) }}</p>
                    </a>
                </article>
                <br>
            @endforeach
        </div>
        <p><br>
        </p>
        {{ $posts->links() }}
      
    </div>
  </div>
</div>


</body>
 

    <div class = "container max-w-5xl mx-auto px-4 md:px-12 pb-3 mt-3 break-words bg-emerald-50">
                <h2 class = "mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl"><br>Ecoな検索エンジンの紹介🌳</h1>
                <p class = "mx-auto max-w-screen-md text-center text-green-500 md:text-lg">Ecosia(エコジア)
                <br>
                あなたのChange Challengeは？
                <br>
                毎日のインターネット検索に、環境保護にコミットするサーチエンジンEcosia（エコジア）を使うこと。<br>検索するだけで植樹に貢献できるんです！
                <br>
                <a href="https://www.ecosia.org/" class="underline text-blue-500 hover:text-blue-600" target="_blank">A better planet with every search</a>
                <br>
                </p>
                
                <br>
                    <img src="{{ asset('images/balderschwang-447187_640.jpg') }}" class="md:mx-auto">
                <br>
    </div>
    <br>
    <footer>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <!-- text - start -->
        <div class="mb-10 md:mb-16">
      <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">FootPrints</h2>

      <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">旅が好きになるゲストハウス掲示板 GhbB Urs <br> &copy;GhbB Urs</p>
    </footer>
        </div>
    </div>
</div>
</x-app-layout>
