{{-- بسم الله الرحمن الرحيم --}}

@props(['tags'])

@php
    $tags = explode(',', $tags)
@endphp

<div class="container border border-gray-300 mt-10">
    <h1 class="font-bold text-2xl text-gray-700 p-5">Key Words&nbsp;<i class="fa-sharp fa-solid fa-key"></i></h1>
    {{-- Dynamic From DB --}}
    <ul class="md:flex text-xs gap-2 m-5 mt-0">
        @foreach ($tags as $tag)
            <li class="bg-gray-800 text-gray-100 inline-block p-2 rounded md:my-0 hover:bg-gray-700 transition duration-300 "><a href="/blog?tag={{ $tag }}">{{ $tag }}</a></li>
        @endforeach
    </ul>
</div>
