@extends('layouts.articles')
<x-banner title="首頁 Banner" />
@section('main')
<div class="articles-container">
    <h2 class=" font-thin text-2xl" style="background-color: #000080; color: white; margin: 5px; text-align: center;">文章列表</h2>

    <a href="{{ route('articles.create') }}" style="padding: 5px;">新增文章</a>
    <div class="articles-list">
        @foreach($articles as $article)
        <div class="border-t border-gray-300 my-1 p-2">
            <h2 class="font-bold text-lg">
                <a href="{{ route('articles.show', $article) }}">
                    {{ $article->title }}
                </a>
            </h2>
            <p>
                {{ $article->created_at }} 由 {{ $article->user->name }} 分享
            </p>

            <div class="flex">
                <a href="{{ route('articles.edit',['article' => $article->id]) }}" class="btn">編輯</a>

                <from action="{{route('articles.destroy',$article)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn" style="margin: 0 10px;">刪除</button>
                </from>
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