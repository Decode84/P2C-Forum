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
</head>

<body class="h-full min-h-screen">
    <div class=" bg-gray-100 overflow-y-auto">
        <div x-data="{ open: false }" @keydown.window.escape="open = false" class="min-h-full">
            <div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
                @include('admin.layouts.partials.sidebar')
            </div>

            <div class="lg:pl-64 min-h-screen flex flex-col flex-1">
                @include('admin.layouts.partials.header')
                <main class="flex-1 bg-pal-1 pb-8">
                    <div class="mt-8">
                        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                            {{ $slot }}
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>

</html>
