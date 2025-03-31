<x-banner title="首頁 Banner" />
@extends('layouts.message')

@section('main')
<div class="container w-full mx-auto">
    <div class="message-create-container" style="border: 4px solid #290083;margin: 10px 0 10px 0 ;">
        <h2 class="font-thin text-2xl" style="background-color: #290083; color: white; margin: 2px; text-align: center;">編輯留言</h2>
        <h3 style="margin-left: 5px;">{{ $message->user->name }}</h3>

        @if($errors->any())
        <div class="errors p-3 bg-red-500 text-red-100 font-thin rounded">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('messages.update', $message->id) }}" method="post" style="margin-right: 5px;">
            @csrf
            @method('PATCH')
            <div class="field my-1">
                <label for="content" class="block"></label>
                <textarea name="content" id="content" class="w-full h-100 resize" style="border: 3px solid #b7b7b7; margin: 2px;">{{ $message->content }}</textarea>
            </div>
            <div class="actions">
                <button type="submit" class="btn">更新留言</button>
                <a href="{{ route('messages.index') }}" class="btn">返回留言板</a>
            </div>
        </form>
    </div>
</div>
@endsection