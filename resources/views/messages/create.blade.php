@extends('layouts.message')

@section('main')
<h2 class="font-thin text-2xl">留言板 > 新增留言</h2>

@if($errors->any())
<div class="errors p-3 bg-red-500 text-red-100 font-thin rounded">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('messages.store') }}" method="post">
    @csrf
    <div class="field my-1">
        <label for="content" class="block">内文</label>
        <textarea name="content" id="content" cols="30" rows="5" class="border border-gray-300 m-4">{{ old('content') }}</textarea>
    </div>
    <div class="actions">
        <button type="submit" class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300">發表留言</button>
        <a href="{{ route('messages.index') }}" class="px-3 py-1 rounded bg-gray-500 text-white hover:bg-gray-600">返回留言板</a>
    </div>
</form>
@endsection