<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    @livewireStyles
</head>

<body>
    @include('layouts.partials._navigation')
    <main class="font-sans antialiased min-h-screen bg-pal-1">
        {{ $slot }}
    </main>

    <footer class="bg-pal-4 relative bottom-0" aria-labelledby="footer-heading">
        @include('layouts.partials._footer')
    </footer>
    @livewireScripts
</body>

</html>
