<x-banner title="首頁 Banner" />
@extends('layouts.message')

@section('main')
<div class="articles-container" style="border: 4px solid #290083;margin: 10px 0 10px 0 ;">
    <h2 class=" font-thin text-2xl" style="background-color: #290083; color: white; margin: 5px; text-align: center;">留言版</h2>
    <a href="" class="px-3 py-1 rounded">返回</a>
    <a href="{{ route('messages.create') }}" style="padding: 5px;">新增留言</a>

    <!-- 留言列表 -->
    <div class="messages-list">
        <!-- 顯示留言 -->
        @foreach($messages as $message)

        <div class="border-t border-gray-300 my-1 p-2">
            <div>
                <div class="flex">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="頭像" class="w-12 h-12 rounded-full">
                    <div style="margin: 0 10px;">
                        <h2 class="font-bold text-lg"> {{ $message->user->name }} </h2>
                        <p> {{ $message->created_at }} </p>
                    </div>
                </div>
                <div style="margin: 10px 0 5px 0;">
                    <p> {{ $message->content }} </p>
                    <div class="flex" style="margin: 10px 0 0 0;">
                        <a class="btn mr-2" href="{{ route('messages.edit', ['message' => $message->id]) }}">編輯</a>
                        <form action="{{ route('messages.destroy', $message) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class=" btn">刪除</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection