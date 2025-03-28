@extends('layouts.message')

@section('main')
<div class="articles-container" style="border: 4px solid #290083;margin: 10px 0 10px 0 ;">
    <h2 class=" font-thin text-2xl" style="background-color: #290083; color: white; margin: 5px; text-align: center;">留言版</h2>

    <!-- 留言列表 -->
    <a href="{{ route('messages.create') }}" style="padding: 5px;">新增留言</a>
    <div class="messages-list">
        @foreach($messages as $message)
        <div class="border-t border-gray-300 my-1 p-2">
            <h2 class="font-bold text-lg"> {{ $message->user->name }} </h2>
            <p> {{ $message->created_at }} </p>
            <p> {{ $message->content }} </p>
            <a href="{{ route('messages.edit', ['message' => $message->id]) }}">編輯</a>
        </div>
        @endforeach
    </div>
</div>

@endsection