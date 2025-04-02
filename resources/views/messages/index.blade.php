@extends('layouts.message')
<x-banner title="首頁 Banner" />
@section('main')
<div class="articles-container" style="border: 4px solid #0000A8;margin: 10px 0 10px 0; background-color: #C0C4C8;">
    <h2 class=" font-thin text-2xl" style="background-color:#0000A8; color: white; margin: 5px; text-align: center;">留言版</h2>
    <a href="{{ url('/') }}" class="px-3 py-1 rounded">返回</a>
    <a href="{{ route('messages.create') }}" style="padding: 5px;">新增留言</a>

    <div class="messages-list">
        @foreach($messages as $message)
        <div class="border-t border-gray-300 my-1 p-2">
            <div class="flex">
                <img src="{{ $message->user->profile_photo_url ?? asset('default-avatar.png') }}" alt="頭像" class="w-12 h-12 rounded-full">
                <div style="margin: 0 10px;">
                    <h2 class="font-bold text-lg"> {{ $message->user->name }} </h2>
                    <p> {{ $message->created_at }} </p>
                </div>
            </div>
            <div class="h-16 my-2">
                <p> {{ $message->content }} </p>
            </div>
            <div class="flex">
                <div>
                    <a href="{{ route('messages.edit',['message' => $message->id]) }}" class="btn" style="display: inline-block; margin-right: 5px;">編輯</a>
                </div>
                <form action="{{ route('messages.destroy', $message) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn" style="margin: 0 5px;">刪除</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class=" pagination">
    {{ $messages->links() }}
</div>
@endsection