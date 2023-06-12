{{-- بسم الله الرحمن الرحيم --}}

{{-- @php
echo '<pre>';
var_dump($post);
echo '</pre>';
die()
@endphp --}}


<x-layout>
    <div class="container m-auto text-center py-10 text-gray-700">
        <h1 class="font-bold text-5xl">{{ $post->title }}</h1>
        <div class="mt-4">
            By: <span class="text-gray-400 italic">{{ $post->user->name }}</span> &nbsp;&nbsp;
            On: <span class="text-gray-400 italic">{{ date('d-m-Y', strtotime($post->updated_at)) }}</span>
        </div>
    </div>
    <div class="container m-auto pt-10 pb-5">
        <div class="flex h-96">
            <img class="object-cover w-full sm:rounded-lg" src="{{ asset('posts_images/' . $post->image) }}" alt="">
        </div>
        <p class="text-l py-8 text-gray-700 leading-6 mb-5">
            {{ $post->description }}
        </p>
        @if (Auth::user() && auth()->user()->id === $post->user_id)
            {{-- Edit Post --}}
            <a href="/blog/{{ $post->slug }}/edit" class="bg-blue-700 text-gray-100 py-3 px-4 mr-3 font-bold rounded place-self-start hover:text-gray-700 hover:bg-blue-300 trasition duration-300"><i class="fa-solid fa-pen-to-square"></i>&nbsp; Edit</a>
            {{-- Delete Post --}}
            <form action="/blog/{{ $post->slug }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-700 text-gray-100 py-3 px-4 mt-5 font-bold rounded place-self-start hover:text-gray-700 hover:bg-red-300 trasition duration-300">Delete &nbsp;<i class="fa-solid fa-trash"></i></button>
            </form>
        @endif
        <div class="container border border-gray-300 mt-10">
            <h1 class="font-bold text-2xl text-gray-700 p-5">Key Words&nbsp;<i class="fa-sharp fa-solid fa-key"></i></h1>
            {{-- Dynamic From DB --}}
            <ul class="md:flex text-xs gap-2 m-5 mt-0">
                <li class="bg-gray-800 text-gray-100 inline-block p-2 rounded md:my-0 hover:bg-gray-700 transition duration-300 "><a href="/">PHP</a></li>
                <li class="bg-gray-800 text-gray-100 inline-block p-2 rounded md:my-0 hover:bg-gray-700 transition duration-300 "><a href="/">Programming</a></li>
                <li class="bg-gray-800 text-gray-100 inline-block p-2 rounded md:my-0 hover:bg-gray-700 transition duration-300 "><a href="/">Software</a></li>
                <li class="bg-gray-800 text-gray-100 inline-block p-2 rounded md:my-0 hover:bg-gray-700 transition duration-300 "><a href="/">Backend</a></li>
            </ul>
        </div>
    </div>
</x-layout>
