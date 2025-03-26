<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    public function index()
    {
        $messages = Message::with('user')->orderby('id', 'desc')->paginate(4);

        return view('messages.index', ['messages' => $messages]);
    }

    // 新增留言
    public function create()
    {
        return view('messages.create');
    }

    // 儲存留言
    public function store(Request $request)
    {
        // 驗證輸入
        $content = $request->validate([
            'content' => 'required|min:10'
        ]);

        // Message::create([
        //     'user_id' => Auth::id(),
        //     'content' => $request->content,
        // ]);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', '請先登入才能留言');
        }

        return redirect()->route('messages.index')->with('success', '留言已發表！');
    }
}
