{{-- بسم الله الرحمن الرحيم --}}

<x-layout>
    {{-- HERO Section --}}
    @include('partials._hero');

    {{-- A Blog --}}
    <div class="container sm:grid grid-cols-2 gap-10 mx-auto mt-20">
        <div class="lg:mx-10 md:mx-5">
            <img class="sm:rounded-lg" src="https://picsum.photos/id/1/960/620" alt="">
        </div>

        <div class="flex flex-col items-left justify-center m-10 sm:m-0">
            <h2 class="font-bold text-gray-700 text-4xl uppercase">
                How To Be An Expert in 2023
            </h2>
            <p class="text-gray-600 text-xl font-bold pt-2">
                You can find a list of all programming languages here
            </p>
            <p class="text-gray-500 text-sm py-4 leading-5">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quam magnam, ex eius at ratione modi, itaque distinctio commodi repudiandae nisi, assumenda corporis incidunt odit esse. Eligendi magnam possimus non.
            </p>
            <a class="bg-gray-700 text-gray-100 py-4 px-5 uppercase font-bold rounded-lg place-self-start hover:text-gray-700 hover:bg-gray-300 trasition duration-300" href="/">Read More</a>
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
                    <li class="bg-yellow-100 text-yellow-700 inline-block p-2 rounded my-1 md:my-0 hover:bg-yellow-500 hover:text-yellow-100 transition duration-300 "><a href="/">PHP</a></li>
                    <li class="bg-yellow-100 text-yellow-700 inline-block p-2 rounded my-1 md:my-0 hover:bg-yellow-500 hover:text-yellow-100 transition duration-300 "><a href="/">Programming</a></li>
                    <li class="bg-yellow-100 text-yellow-700 inline-block p-2 rounded my-1 md:my-0 hover:bg-yellow-500 hover:text-yellow-100 transition duration-300 "><a href="/">Software</a></li>
                    <li class="bg-yellow-100 text-yellow-700 inline-block p-2 rounded my-1 md:my-0 hover:bg-yellow-500 hover:text-yellow-100 transition duration-300 "><a href="/">Backend</a></li>
                </ul>
                <h3 class="text-l leading-6 py-10">
                    PHP: A popular general-purpose scripting language that is especially suited to web development.
                    Fast, flexible and pragmatic, PHP powers everything from your blog to the most popular websites in the world.The PHP development team announces the immediate availability of PHP 8.1.19. This is a bug fix release.
                </h3>
                <a class="bg-transparent border-2 text-gray-100 py-4 px-5 uppercase font-bold rounded-lg place-self-start hover:text-gray-700 hover:bg-gray-300 trasition duration-300" href="/">Read More</a>
            </div>
        </div>
        <div class="flex">
            <img class="object-cover" src="https://picsum.photos/id/111/960/620" alt="">
        </div>
    </div>

</x-layout>
