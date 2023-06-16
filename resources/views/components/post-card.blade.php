{{-- بسم الله الرحمن الرحيم --}}

{{-- Binding Data From index page --}}
@props(['post'])

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
                @php
                    $desc = Str::substr($post->description, 0, 200);
                @endphp
                {{ $desc }}...
            </p>
            <a href="/blog/{{ $post->slug }}" class="bg-gray-700 text-gray-100 py-3 px-4 uppercase text-sm font-bold rounded-lg place-self-start hover:bg-gray-800 trasition duration-300">Read More &nbsp;<i class="fa-solid fa-circle-info"></i></a>
        </span>
    </div>
</div>
