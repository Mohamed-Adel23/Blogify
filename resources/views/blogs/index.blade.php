<x-layout>
    <div class="container m-auto text-center py-10 text-gray-700">
        <h1 class="font-bold text-6xl">All Posts</h1>
    </div>

    @if (Auth::check())
        <div class="container sm:grid mx-auto px-5 py-5 border-b border-gray-300">
            <a href="/blog/create" class="bg-green-700 text-gray-100 py-3 px-4 uppercase font-bold rounded-lg place-self-start hover:bg-green-600 trasition duration-300">Create New Post</a>
        </div>
    @endif



    @foreach ($posts as $post)
        <div class="container sm:grid grid-cols-2 gap-20 mx-auto px-5 py-20 border-b border-gray-300">
            <div class="flex">
                <img class="object-cover sm:rounded-lg" src="{{ asset('posts_images/' . $post->image) }}" alt="">
            </div>
            <div>
                <h2 class="text-4xl font-bold text-gray-700 py-5 md:pt-0">{{ $post->title }}</h2>
                <span>
                    By: <span class="text-gray-400 italic">{{ $post->user->name }}</span> &nbsp;&nbsp;
                    On: <span class="text-gray-400 italic">{{ date('d-m-Y', strtotime($post->updated_at)) }}</span>
                    <p class="leading-8 text-gray-700 text-l py-5">
                        {{ $post->description }}
                    </p>
                    <a href="/blog/{{ $post->slug }}" class="bg-gray-700 text-gray-100 py-3 px-4 uppercase font-bold rounded-lg place-self-start hover:text-gray-700 hover:bg-gray-300 trasition duration-300">Read More</a>
                </span>
            </div>
        </div>
    @endforeach
</x-layout>
