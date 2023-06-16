{{-- بسم الله الرحمن الرحيم --}}

<x-layout>
    <div class="container m-auto text-center py-10 text-gray-700">
        <h1 class="font-bold text-5xl">Manage Your Posts</h1>
    </div>

    @if ($myposts[0] ?? false)
        <div class="container m-auto mt-10" style="border-bottom: 1px solid rgb(180, 180, 180)"></div>
        @php $counter = 1; @endphp
        @foreach ($myposts as $post)
            <div class="container m-auto mt-5 py-3 flex justify-between mar" style="border-bottom: 1px solid rgb(180, 180, 180)">
                <a href="/blog/{{ $post->slug }}">
                    <h3 class="font-bold text-2xl text-gray-500 inline-block hover:text-gray-700 hover:underline transition duration-200 tex1">{{ $counter++ }}. {{ $post->title }}</h3>
                </a>
                <div class="flex justify-between items-center tex2" style="flex-basis: 30%;">
                    <a href="/blog/{{ $post->slug }}/edit" class="font-bold" style="color: rgb(92, 92, 204)"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <form action="/blog/{{ $post->slug }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-bold" style="color: rgb(204, 92, 92)"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        @include('errors.no-data')
    @endif

</x-layout>
