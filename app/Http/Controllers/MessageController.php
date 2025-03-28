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

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $content = $request->validate([
            'content' => 'required|min:10'
        ]);
        $user()->messages()->create($content);
        return redirect()->route('messages.index')->with('success', '留言已發表！');
    }
    public function edit($id)
    {
        $user = Auth::user();
        $message = $user->messages()->find($id);

        if (!$message) {
            return redirect()->route('messages.index')->with('error', '無法編輯此留言');
        }

        return view('messages.edit', ['message' => $message]);
    }

    public function update(Request $request, $id)
    {
        $message = auth()->user()->messages()->find($id);

        $content = $request->validate([
            'content' => 'required|min:10'
        ]);

        $message->update($content);

        return redirect()->route('messages.index')->with('notice', '留言更新成功!');
    }
    public function destroy($id)
    {
        $message = auth()->user()->messages()->find($id);
        $message->delete();
        return redirect()->route('root')->with('notice', '留言已刪除!');
    }
}
