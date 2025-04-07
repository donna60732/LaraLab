@extends('layouts.articles')
<x-banner title="首頁 Banner" />
@section('main')
<div class="articles-container" style="border: 4px solid #0000A8; margin: 10px 0 10px 0; background-color: #C0C4C8;">
    <div class="relative">
        <h2 class=" font-medium text-2xl" style=" color: white; text-align: center;background-color: #0000A8;">Article</h2>
        <div class="btn absolute" style="top: 0;left: 0;">
            <a href="{{ route('articles.create') }}">+</a>
        </div>
    </div>
    <div class="articles-list">
        @foreach($articles as $article)
        <div class="border-t border-gray-300 p-2">
            <h2 class="font-bold text-lg">
                <a href="{{ route('articles.show', $article) }}">
                    {{ $article->title }}
                </a>
            </h2>
            <p class="my-2">
                {{ $article->created_at }} 由 {{ $article->user->name }} 分享
            </p>

            <div class="flex">
                @can('edit', $article)
                <a href="{{ route('articles.edit',['article' => $article->id]) }}" class="btn">編輯</a>
                @endcan
                @can('delete', $article)
                <from action="{{route('articles.destroy',$article)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn" style="margin: 0 10px;">刪除</button>
                </from>
                @endcan
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- 分頁 -->
<div class="pagination flex justify-center my-2">
    {{ $articles->links() }}
</div>
@endsection