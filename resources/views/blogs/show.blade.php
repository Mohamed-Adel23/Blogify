{{-- بسم الله الرحمن الرحيم --}}

{{-- @php
echo '<pre>';
var_dump($post);
echo '</pre>';
die()
@endphp --}}


<x-layout>

    {{-- Alert --}}
    @if (session()->has('message'))
        <div class="bg-indigo-900 text-center py-4 lg:px-4">
            <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">New</span>
            <span class="font-semibold mr-2 text-left flex-auto">{{ session()->get('message') }}</span>
            <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
            </div>
        </div>
    @endif

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
        <p class="text-l py-8 text-gray-700 leading-6 mb-10">
            {{ $post->description }}
        </p>

        @if (Auth::user() && auth()->user()->id === $post->user_id)
            {{-- Edit Post --}}
            <a href="/blog/{{ $post->slug }}/edit" class="bg-blue-700 text-gray-100 py-2 px-4 font-bold rounded place-self-start hover:text-gray-700 hover:bg-blue-300 trasition duration-300">Edit</a>
            {{-- Delete Post --}}
            <form action="/blog/{{ $post->slug }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-700 text-gray-100 py-2 px-4 mt-5 font-bold rounded place-self-start hover:text-gray-700 hover:bg-red-300 trasition duration-300">Delete</button>
            </form>
        @endif
    </div>
</x-layout>
