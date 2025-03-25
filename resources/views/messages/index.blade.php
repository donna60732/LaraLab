@extends('layouts.message')

@section('main')
<h2 class="font-thin text-2xl">留言版</h2>
<a href="{{ route('messages.create') }}">我要留言</a>

@endsection