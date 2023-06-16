{{-- بسم الله الرحمن الرحيم --}}

<x-layout>
    @if ($post ?? false)
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
            <p class="text-l py-8 text-gray-700 leading-6 mb-5 desc">
                {{ $post->description }}
            </p>
            @if (Auth::user() && auth()->user()->id === $post->user_id)
                {{-- Edit Post --}}
                <a href="/blog/{{ $post->slug }}/edit" class="bg-blue-700 text-gray-100 py-3 px-4 mr-3 font-bold rounded place-self-start hover:text-gray-700 hover:bg-blue-300 trasition duration-300 edit"><i class="fa-solid fa-pen-to-square"></i>&nbsp; Edit</a>
                {{-- Delete Post --}}
                <form action="/blog/{{ $post->slug }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-700 text-gray-100 py-3 px-4 mt-5 font-bold rounded place-self-start hover:text-gray-700 hover:bg-red-300 trasition duration-300 edit">Delete &nbsp;<i class="fa-solid fa-trash"></i></button>
                </form>
            @endif

            {{-- Display Post Tags --}}
            <x-post-tags :tags="$post->tags"/>
        </div>
    @else
        @include('errors.no-data')
    @endif
</x-layout>
