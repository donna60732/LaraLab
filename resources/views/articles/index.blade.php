@extends('layouts.articles')

@section('main')
<div class="container w-full mx-auto">
    <div class="logo-container" style="border: 3px solid #545456;border-bottom: 3px solid#ffffff; padding: 5px; text-align: center;">
        <h1 class="text-4xl sm:text-3xl font-bold text-gray-800">LaraLab</h1>
    </div>
    <!-- Banner 和按鈕區 -->
    <div class="banner" style="border: 3px solid #545456; padding: 5px; text-align: center;">
        <a href=" {{ route('messages.index') }}" class="btn btn-primary">留言板</a>

        <!-- 登入按鈕，僅顯示未登入的使用者 -->
        @guest
        <a href="{{ route('login') }}" class="btn btn-secondary ml-4">登入</a>
        @endguest
    </div>

</div>


<!-- 文章列表 -->
<div class="articles-container" style="border: 4px solid #290083;margin: 10px 0 10px 0 ;">
    <h2 class=" font-thin text-2xl" style="background-color: #290083; color: white; margin: 5px; text-align: center;">文章列表</h2>
    <!-- 操作區域 -->
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
                <a href="{{ route('articles.edit',['article' => $article->id]) }}" class="mr-2 px-2 rounded bg-gray-500 text-stone-300">編輯</a>

                <from action="{{route('articles.destroy',$article)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="px-2 rounded bg-red-500 text-red-100">刪除</button>
                </from>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- 分頁 -->
<div class="pagination mt-6">
    {{ $articles->links() }}
</div>
@endsection