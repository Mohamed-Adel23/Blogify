{{-- بسم الله الرحمن الرحيم --}}

<x-layout>
    {{-- HERO Section --}}
    @include('partials._hero')

    {{-- Search Bar --}}
    @include('partials._search')

    {{-- A Blog --}}
    <div class="container sm:grid grid-cols-2 gap-10 mx-auto mt-20">
        <div class="lg:mx-10 md:mx-5">
            <img class="sm:rounded-lg" src="{{ asset('posts_images/' . $posts[1]->image) }}" alt="">
        </div>

        <div class="flex flex-col items-left justify-center m-10 sm:m-0">
            <h2 class="font-bold text-gray-700 text-4xl">
                {{ $posts[1]->title }}
            </h2>
            <p class="text-gray-600 text-xl font-bold pt-2">
                You can find a list of all programming languages here
            </p>
            <p class="text-gray-500 text-sm py-4 leading-5">
                {{ Str::substr($posts[1]->description, 0, 200) }}...
            </p>
            <a href="/blog/{{ $posts[1]->slug }}" class="bg-gray-700 text-gray-100 py-3 px-4 uppercase text-sm font-bold rounded-lg place-self-start hover:bg-gray-800 trasition duration-300">Read More &nbsp;<i class="fa-solid fa-circle-info"></i></a>
        </div>
    </div>

    {{-- Blog Categories --}}
    <div class="bg-gray-700 text-center p-20 mt-20 text-gray-100">
        <h2 class="text-2xl">Blog Categories</h2>
        <div class="container mx-auto pt-10 sm:grid grid-cols-4">
            <div class="font-bold text-xl py-2">UX Design</div>
            <div class="font-bold text-xl py-2">Programming</div>
            <div class="font-bold text-xl py-2">Graphic Design</div>
            <div class="font-bold text-xl py-2">Back-End</div>
        </div>
    </div>

    {{-- Recent Posts --}}
    <div class="container mx-auto text-center py-20">
        <h2 class="font-bold text-5xl py-10 text-gray-700">Recent Posts</h2>
        <p class="text-gray-400 sm:px-60 md:px-10 px-10 leading-6">
            PHP: A popular general-purpose scripting language that is especially suited to web development.
            Fast, flexible and pragmatic, PHP powers everything from your blog to the most popular websites in the world.The PHP development team announces the immediate availability of PHP 8.1.19. This is a bug fix release.
        </p>
    </div>
    <div class="sm:grid grid-cols-2 w-4/5 mx-auto">
        <div class="flex bg-yellow-700 text-yellow-100 pt-10">
            <div class="block m-auto pt-4 pb-10 w-4/5">
                <ul class="md:flex text-xs gap-2">
                    @php $tags = explode(',', $posts[0]->tags); @endphp
                    @foreach ($tags as $tag)
                        <li class="bg-yellow-100 text-yellow-700 inline-block p-2 rounded my-1 md:my-0 hover:bg-yellow-500 hover:text-yellow-100 transition duration-300 "><a href="/blog?tag={{ $tag }}">{{ $tag }}</a></li>
                    @endforeach
                </ul>
                <h3 class="text-l leading-6 py-10">
                    {{ Str::substr($posts[0]->description, 0, 200) }}...
                </h3>
                <a  href="/blog/{{ $posts[0]->slug }}" class="bg-transparent border-2 text-gray-100 py-3 px-5 uppercase text-sm font-bold rounded-lg place-self-start hover:text-gray-700 hover:bg-gray-300 trasition duration-300">Read More &nbsp;<i class="fa-solid fa-circle-info"></i></a>
            </div>
        </div>
        <div class="flex">
            <img class="object-cover" src="{{ asset('posts_images/' . $posts[0]->image) }}" alt="">
        </div>
    </div>
</x-layout>
