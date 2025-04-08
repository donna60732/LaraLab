@extends('layouts.message')
<x-banner title="首頁 Banner" />
@section('main')
<div class="container w-full mx-auto">
    <div class="message-create-container" style="border: 4px solid #0000A8;margin: 10px 0 10px 0 ;">
        <h2 class="font-thin text-2xl text-white" style="background-color: #0000A8; margin: 2px; text-align: center;">發佈留言</h2>
        <a href="{{ route('messages.index') }}" class="px-3 py-1 rounded">返回</a>

        @if($errors->any())
        <div class="errors p-3 bg-red-500 text-red-100 font-thin rounded">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
            <div style="margin: 5px 10px 5px 5px;">
                <label for="content" class="block" style="margin: 2px;">留言内容</label>
                <textarea name="content" id="content" class="w-full h-100 resize-y" style="border: 3px solid #b7b7b7; margin: 2px;">{{ old('content') }}</textarea>
            </div>
            <div class="captcha-list" style="margin: 5px;">
                <div class="flex" style="margin: 5px;">
                    <label for="captcha" style="margin: 2px;">驗證碼：</label>
                    <img src="{{ captcha_src() }}" alt="captcha" id="captcha-img">
                    <a href="javascript:void(0)" onclick="reloadCaptcha()">
                        <x-heroicon-o-arrow-path class="w-6 h-6 text-blue-500" style="margin: 3px;" />
                    </a>
                </div>
                <input type="text" name="captcha" value="{{ old('captcha') }}" required style="border: 3px solid #b7b7b7; margin: 2px;">
            </div>
            <div class="actions text-center" style="text-align: center;">
                <button type="submit" class="btn" style="margin: 0 0 10px 0;">發佈留言
                </button>
            </div>
        </form>

        <script>
            function reloadCaptcha() {
                fetch("{{ route('captcha.reload') }}")
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('captcha-img').src = data.captcha + '?' + Date.now();
                    });
            }
        </script>
    </div>
</div>
@endsection