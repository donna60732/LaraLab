<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>LaraLab</title>
</head>

<body class="banner w-full" style="border: 3px solid #545456;">
    <a href="{{ url('/') }}">
        <h1 class="font-bold text-3xl text-normal text-white text-center" style=" background-color: #0000A8;">LaraLab</h1>
    </a>
    <div class="container w-full">
        <div class="banner-list" style="margin: 0 10px;">
            <a href=" {{ route('articles.index') }}" class="font-bold" style="margin-right: 10px;">Article</a>
            <a href=" {{ route('messages.index') }}" class="font-bold" style="margin-right: 10px;">Messages</a>
            @guest
            <a href="{{ route('login') }}" class="font-bold" style="margin-right: 10px;">Login</a>
            <a href="{{ route('register') }}" class="font-bold" style="margin-right: 10px;">Register</a>
            @endguest

            @auth
            <a href="{{ route('dashboard') }}" class="font-bold" style="margin-right: 10px;">{{ Auth::user()->name }}</a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="font-bold">Log out</button>
            </form>
            @endauth
        </div>
    </div>
</body>

</html>