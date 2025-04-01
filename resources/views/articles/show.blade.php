@extends('layouts.articles')
<x-banner title="首頁 Banner" />
@section('main')
<a href="{{ route('articles.index') }}">回文章列表</a>
<div style="border: 4px solid #0000A8; margin: 10px 0 10px 0;">
    <h2 class=" font-thin text-2xl" style="background-color: #0000A8; color: white; margin: 5px; text-align: center;">{{ $article->title }}</h2>
    <p class="text-lg text-gray-700 p-2">
        {{ $article->content }}
    </p>
</div>


@endsection