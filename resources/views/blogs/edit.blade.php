{{-- لا إله إلا الله محمد رسول الله --}}

<x-layout>
    <div class="container m-auto text-center py-10 text-gray-700">
        <h1 class="font-bold text-6xl">Edit A Post</h1>
    </div>

    <div class="container m-auto pt-15 pb-5">
        <form action="/blog/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="text" name="title" placeholder="Title" class="w-full h-20 text-4xl text-gray-700 rounded-lg shadow-lg border-b" style="padding: 50px; margin-bottom: 30px"
                value="{{ $post->title }}"
            >
            {{-- Display Validation Errors --}}
            @error('title')
                <p class="text-red-500 text-xs mb-5">{{ $message }}</p>
            @enderror

            <textarea name="description" placeholder="Description" class="w-full h-60 text-l text-gray-600 leading-6 rounded-lg shadow-lg border-b" style="padding: 30px; margin-bottom: 30px">{{ $post->description }}</textarea>
            {{-- Display Validation Errors --}}
            @error('description')
                <p class="text-red-500 text-xs mb-5">{{ $message }}</p>
            @enderror

            {{-- Display The Current Image --}}
            <div class="flex h-60 justify-center mb-5">
                <img class="object-cover sm:rounded-lg" src="{{ asset('posts_images/' . $post->image) }}" alt="">
            </div>

            <div class="flex items-center justify-center w-full mb-10">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-300 bg-gray-200 hover:bg-gray-100 border-gray-400 dark:hover:border-gray-500 hover:bg-gray-300 transition duration-300">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to change the image</span> or drag and drop</p>
                        {{-- <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p> --}}
                    </div>
                    <input id="dropzone-file" name="image" type="file" class="hidden" />
                    @error('image')
                        <p class="text-red-500 text-xs mb-5">{{ $message }}</p>
                    @enderror
                </label>
            </div>

            <button type="submit" class="
                bg-green-700 hover:bg-green-600
                text-gray-200
                cursor-pointer
                py-5 px-8 rounded-lg
                font-bold uppercase
                transition duration-300
            ">
                Update The Post
            </button>
        </form>
    </div>
</x-layout>

