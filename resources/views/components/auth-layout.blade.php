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
<body class="">
    <section class="bg-gray-50 bg-gray-900">
        {{ $slot }}
    </section>
</body>
</html>
