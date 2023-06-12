<div class="hero-bg-image flex flex-col items-center justify-center text-center">
    @auth
        <p class="font-bold text-4xl py-5 z-10" style="color: #febd59;">{{ auth()->user()->name }},</p>
    @endauth
    <h1 class="text-gray-100 text-5xl uppercase font-bold pb-10 z-10">Welcome To Blogify</h1>
    <a class="bg-gray-100 text-gray-700 py-4 px-5 uppercase font-bold rounded-lg z-10 hover:text-gray-100 hover:bg-gray-700 trasition duration-300" href="/blog">Start Reading </a>
</div>
