@extends('layouts.message')

@section('main')
<div class="articles-container" style="border: 4px solid #290083;margin: 10px 0 10px 0 ;">
    <h2 class=" font-thin text-2xl" style="background-color: #290083; color: white; margin: 5px; text-align: center;">留言版</h2>
    <a href="{{ route('messages.create') }}" style="padding: 5px;">新增留言</a>
</div>
@endsection