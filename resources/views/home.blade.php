<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>LaraLab</title>
</head>

<body class="w-full" style="border: 3px solid #545456;">
    <a href="{{ url('/') }}">
        <h1 class="font-bold text-3xl text-normal text-white text-center" style=" background-color: #000080;">LaraLab</h1>
    </a>
    <div class="container w-full">
        <div class="banner-list" style="margin: 0 10px;">
            <a href=" {{ route('articles.index') }}" class="font-bold" style="margin-right: 10px;">Article</a>
            <a href=" {{ route('messages.index') }}" class="font-bold" style="margin-right: 10px;">Messages</a>
            @guest
            <a href="{{ route('login') }}" class="font-bold">Login</a>
            @endguest
        </div>
    </div>
</body>

</html>