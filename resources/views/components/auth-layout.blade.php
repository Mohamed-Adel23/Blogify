<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogify | Auth</title>
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Nunito:wght@200;300;400;500;600;700;800&family=Open+Sans:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    {{-- Website Icon --}}
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    {{-- Tailwindcss --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 bg-gray-900">
    <header>
        <nav class="border-gray-200 px-4 lg:px-6 py-3.5 bg-gray-700">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Blogify Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Blogify</span>
                </a>
                <a class="text-gray-300 hover:text-gray-100 trasition duration-300" href="https://www.linkedin.com/in/mohamed2-adel/" >BnAdel</a>
            </div>
        </nav>
    </header>

    {{ $slot }}

    <footer>
        <div class="bg-gray-700 py-5">
            <div class="text-center">
                <div class="container mx-auto text-gray-400">Copyright &copy; 2023, All Rights reserved
                    <a class="text-gray-300 hover:text-gray-100 trasition duration-300" href="https://www.linkedin.com/in/mohamed2-adel/" >BnAdel</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
