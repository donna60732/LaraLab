@extends('layouts.message')

@section('main')
<div class="container w-full mx-auto">
    <div class="message-create-container" style="border: 4px solid #000080;margin: 10px 0 10px 0 ;">
        <h2 class="font-thin text-2xl" style="background-color: #000080; color: white; margin: 2px; text-align: center;">發佈留言</h2>
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

        <form action="{{ route('messages.store') }}" method="post" style="margin-right: 5px;">
            @csrf
            <div class="field my-1">
                <label for="content" class="block"></label>
                <textarea name="content" id="content" class="w-full h-100 resize-y" style="border: 3px solid #b7b7b7; margin: 2px;">{{ old('content') }}</textarea>
            </div>
            <div class="actions text-center" style="text-align: center;">
                <button type="submit" class="btn" style="margin: 0 0 10px 0;">發表留言
                </button>
            </div>
        </form>
    </div>
</div>
@endsection