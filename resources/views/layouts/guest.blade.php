<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <main class="font-sans antialiased min-h-screen bg-pal-1">
        {{ $slot }}
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
