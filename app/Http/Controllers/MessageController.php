<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        // 取得所有留言，並且帶出留言者的資訊
        $messages = Message::with('user')->latest()->get();

        return view('messages.index', compact('messages'));
    }
    // 新增留言
    public function create()
    {
        return view('messages.create');
    }
}
