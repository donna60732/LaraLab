<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>LaraLab</title>
</head>

<body class="">
    <div class="container w-full mx-auto" style="border: 3px solid #545456;">
        <div class="logo-container" style=" text-align: center">
            <h1 class="text-4xl sm:text-3xl font-bold text-gray-800" style=" text-align: center;border-bottom: 3px solid #545456;">LaraLab</h1>
            <div class="banner-list">
                <a href=" {{ route('articles.index') }}" class="">文章列表</a>
                <a href=" {{ route('messages.index') }}" class="">留言板</a>
                @guest
                <a href="{{ route('login') }}" class="">登入</a>
                @endguest
            </div>
        </div>
    </div>
</body>

</html>