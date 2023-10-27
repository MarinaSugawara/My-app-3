<x-app-layout>
    <div class="h-14 bg-gradient-to-r from-cyan-500 to-blue-500"></div>

    <div class="px-4 md:px-12 pb-3 break-words bg-lime-100">

        <!-- 変えてみたとこ -->

        <!-- <body> -->

        <div class="w-full m-0 p-0 bg-cover bg-bottom">
            <div class="container max-w-4xl mx-auto pt-16 md:pt-16 text-center break-normal">
                <!--Title-->
                <p class="font-extrabold text-1xl md:text-5xl text-orange-600">
                    GhbB Urs <br>[Guest house Bulletin board YOURS]
                    <br>
                </p>

                <p class="text-xl md:text-xl text-gray-500">ゲストハウス情報を共有しよう✨ <br></p>
                <img src="{{ asset('images/北欧版.jpg') }}" class="md:mx-auto mt-3 md:w-4/5">
                <br>
                <br>

            </div>

            <div class="bg-white py-6 sm:py-8 lg:py-12">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                    <!-- text - start -->
                    <div class="mb-10 md:mb-16">
                        <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">投稿一覧</h2>

                        <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">あなたの正直な投稿が人の旅・人生を変える!
                        </p>
                        <div>
                            {{-- 検索機能 形だけ --}}
                            <label for="hs-search-box-with-loading-2"
                                class="block text-sm font-medium mb-2 dark:text-white">検索フォーム</label>
                        </div>
                        {{-- 検索機能2 --}}

                        <form method="GET" action="{{ route('posts.index') }}">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    
                                </div>
                                <input name="search" type="search" id="default-search"
                                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="🔍入力">
                                <button type="submit"
                                    class="absolute right-2.5 bottom-2 top-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">検索</button>
                            </div>
                        </form>

                        {{-- End --}}
                    </div>
                    <!-- text - end -->

                    <div class="bg-gray-100 p-6 rounded-lg">
                        <x-flash-message :message="session('notice')" />
                        {{-- 終了タグはなし 文字列として変数を渡す --}}
                        <x-validation-errors :errors="$errors" />

                        <div class="flex flex-wrap -mx-1 lg:-mx-4 mb-4">
                            @foreach ($posts as $post)
                                <article class="w-full px-4 md:w-1/2  text-gray-800 leading-normal">
                                    <a href="{{ route('posts.show', $post) }}">
                                        <div class="px-20">
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
                                            <p class="text-gray-700 text-base">{{ Str::limit($post->body, 100) }}</p>
                                        </div>
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


            <!-- </body> -->


            <div class = "md:px-12 pb-3 mt-3 break-words bg-emerald-50">
                <h2 class = "mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">
                    <br>🌳Ecoな検索エンジンの紹介🌳
                    </h1>
                    <h1 class= "mx-auto max-w-screen-md text-center text-green-700 text-xl">Ecosia(エコジア)
                </h2>
                <p class = "mx-auto max-w-screen-md text-center text-green-500 md:text-lg">
                    毎日のインターネット検索に、Ecosia（エコジア）を使うだけで...『環境保護・植樹に貢献』できる! <br>日本語検索もOK!
                    <br>
                    <a href="https://www.ecosia.org/" class="underline text-blue-500 hover:text-rose-600"
                        target="_blank">A better planet with every search</a>
                    <br>
                </p>

                <br>
                <img src="{{ asset('images/balderschwang-447187_640.jpg') }}" class="md:mx-auto">
                <br>
            </div>
            <br>

        </div>
    </div>

    <footer>
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <!-- text - start -->
                <div class="mb-10 md:mb-16">
                    <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-1xl">FootPrints ~足跡を残そう
                    </h2>

                    <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">旅が好きになるゲストハウス掲示板 GhbB Urs
                        <br> &copy;GhbB Urs
                    </p>
                </div>
            </div>
        </div>
    </footer>

</x-app-layout>
