@extends('layouts.articles')

@section('main')
<h1 class="font-thin text-4xl">文章 > 新增文章</h1>

@if($errors->any())
<div class="errors p-3 bg-red-500 text-red-100 font-thin rounded">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('articles.store') }}" method="post">
    @csrf
    <div class="field my-1">
        <label for="">標題</label>
        <input type="text" value="{{ old('title') }}" name="title" class="border border-gray-300 p-2 m-4">
    </div>

    <div class="field my-1">
        <label for="" class="block">内文</label>
        <textarea name="content" cols="30" rows="10" class="border border-gray-300 m-4">{{ old('content') }}</textarea>
    </div>
    <div class="actions">
        <button type="submit" class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300">新增文章</button>
    </div>
</form>
@endsection