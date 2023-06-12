<x-layout>
    <div class="container m-auto text-center py-10 text-gray-700">
        <h1 class="font-bold text-6xl">All Posts</h1>
    </div>

    @if (Auth::check())
        <div class="container sm:grid mx-auto px-5 py-5 border-b border-gray-300">
            <a href="/blog/create" class="bg-green-700 text-gray-100 py-3 px-4 uppercase font-bold rounded-lg place-self-start hover:bg-green-600 trasition duration-300"><i class="fa-solid fa-circle-plus"></i> &nbsp;Create New Post</a>
        </div>
    @endif

    {{-- Search Bar --}}
    @include('partials._search')

@if ($posts[0] ?? false)
    @foreach ($posts as $post)

        {{-- Binding Data To post-card Page --}}
        <x-post-card :post="$post" />

    @endforeach
@else
    @include('errors.no-data')
@endif

    {{-- Display Pagination --}}
    <div class="m-6 p-4">
        {{ $posts->links() }}
    </div>
</x-layout>
