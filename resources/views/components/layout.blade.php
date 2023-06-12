<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogify</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Nunito:wght@200;300;400;500;600;700;800&family=Open+Sans:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    {{-- Website Icon --}}
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    {{-- Alpinejs Script --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- Tailwindcss --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <header>
        <nav class="border-gray-200 px-4 lg:px-6 py-3.5 bg-gray-700">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Blogify Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Blogify</span>
                </a>
                <div class="flex items-center justify-between lg:order-2">
                    @auth
                        <a class="bg-gray-800 text-gray-100 hover:text-orange-100 rounded-lg py-3 px-5 transition duration-300" href="/blog"><i class="fa-solid fa-book-open-reader"></i>&nbsp; Blogs</a>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="text-gray-300 rounded-lg py-3 px-3 mx-3 hover:text-red-400 transition duration-300">Log out &nbsp;<i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                        </form>
                        @else
                        <a href="/register" class="bg-yellow-500 text-gray-700 rounded-lg py-3 px-5 font-bold hover:bg-yellow-400 hover:text-gray-700 transition duration-300"><i class="fa-solid fa-user-plus"></i>&nbsp; Sign Up</a>
                        <a href="/login" class="text-gray-100 rounded-lg py-3 px-3 mx-3 font-bold hover:bg-gray-100 hover:text-gray-700 transition duration-300">Log in &nbsp;<i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    {{-- Display Flash Message --}}
    <x-flash-message />

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-gray-700 py-10 mt-20">
        <div class="container mx-auto flex justify-between items-center px-10">
            <div>
                <h3 class="font-bold text-gray-100">Pages</h3>
                <ul class="pt-4 text-gray-400">
                    <li class="pb-2">
                        <a class="hover:text-gray-100 trasition duration-300" href="/">Home</a></li>
                    <li class="pb-2">
                        <a class="hover:text-gray-100 trasition duration-300" href="/blogs">Blogs</a></li>
                    <li class="pb-2">
                        <a class="hover:text-gray-100 trasition duration-300" href="/login">Login</a></li>
                    <li class="pb-2">
                        <a class="hover:text-gray-100 trasition duration-300" href="/register">Register</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-gray-100">Latest Posts</h3>
                <ul class="pt-4 text-gray-400">
                    <li class="pb-2">
                        <a class="hover:text-gray-100 trasition duration-300" href="/">Who We are</a></li>
                    <li class="pb-2">
                        <a class="hover:text-gray-100 trasition duration-300" href="/blogs">The Last Post</a></li>
                    <li class="pb-2">
                        <a class="hover:text-gray-100 trasition duration-300" href="/login">Your success with us</a></li>
                </ul>
            </div>
        </div>
        <p class="text-center text-gray-400 pt-4">Copyright &copy; 2023, All Rights reserved
            <a class="text-gray-300 hover:text-gray-100 trasition duration-300" href="https://www.linkedin.com/in/mohamed2-adel/" >BnAdel</a>
        </p>
    </footer>

</body>
</html>
