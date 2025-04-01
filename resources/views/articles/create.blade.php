@extends('layouts.articles')
<x-banner title="首頁 Banner" />
@section('main')
<div class="container w-full">
    <div class="article-create-container" style="border: 4px solid #0000A8; margin: 10px 0 10px 0;background-color: #C0C4C8;">
        <h2 class="font-thin text-2xl text-white" style="background-color: #0000A8; margin: 2px; text-align: center;">新增文章</h2>
        <a href="{{ route('articles.index') }}" style="margin: 10px;">返回</a>

        @if($errors->any())
        <div class="errors p-3 bg-red-500 text-red-100 font-thin rounded">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('articles.store') }}" method="post" style="margin: 10px;">
            @csrf
            <div>
                <label for="title">標題</label>
                <input type="text" value="{{ old('title') }}" name="title" class="border border-gray-300" style="border:3px solid #b7b7b7;outline: none;">
            </div>

            <div class="w-full">
                <label for="">内文</label>
                <textarea name="content" class="w-full resize-y" style="border:3px solid #b7b7b7;">{{ old('content') }}</textarea>
            </div>
            <div class="actions text-center">
                <button type="submit" class="btn" style="margin: 10px 0;">新增文章</button>
            </div>
        </form>

    </div>
</div>
@endsection