<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入通過 Vite 處理的 CSS / JS 文件 -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>LaraLab</title>
</head>

<body>
    <main class="m-4">
        @if(session()->has('notice'))
        <div class="bg-pink-300 px-3 py-2 rounded">
            {{ session()->get('notice') }}
        </div>
        @endif
        @yield('main')
    </main>
</body>

</html>