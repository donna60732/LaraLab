<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Termwind\Components\Raw;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }
    // 新增文章
    public function create()
    {
        return view('articles.create');
    }
    // 新增文章後存放的地方
    public function store(Request $request)
    {
        // 驗證是否符合規定
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10'
        ]);

        auth()->user()->articles()->create($content);
        return redirect()->route('root')->with('notice', '文章新增成功!');
    }
    // 編輯文章(高老師的版本)
    // public function edit($id)
    // {
    //     $article = auth()->user()->articles()->find($id);
    //     if (!$article) {
    //         return redirect()->route('root')->with('error', '文章未找到或無權限');
    //     }
    //     // $article = Article::find($id);
    //     return view('articles.edit');
    // }

    // 編輯文章
    public function edit($id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', '請先登入');
        }

        // 只查詢當前用戶的文章
        $article = DB::table('articles')->where('id', $id)->where('user_id', $user->id)->first();

        if (!$article) {
            return redirect()->back()->with('error', '文章不存在或無權限');
        }

        return view('articles.edit', compact('article'));
    }

    // 更新文章
    public function update(Request $request, $id)
    {
        // 抓取當前用戶的文章
        $article = auth()->user()->articles()->find($id);
        // 如果文章不存在，則返回錯誤
        if (!$article) {
            return redirect()->back()->with('error', '文章不存在或無權限');
        }
        // 驗證請求資料
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10'
        ]);
        // 更新文章
        $article->update($content);
        // 重定向並顯示成功訊息
        return redirect()->route('root')->with('notice', '文章更新成功!');
    }
}
