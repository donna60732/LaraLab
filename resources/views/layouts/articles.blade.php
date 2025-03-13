<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入通過 Vite 處理的 CSS / JS 文件 -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>我的文章</title>
</head>

<body>
    <main class="m-4">
        @yield('main')
    </main>
</body>

</html>