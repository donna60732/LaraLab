<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index', 'show']);
    }
    // index 頁面
    public function index()
    {
        $articles = Article::with('user')->orderBy('id', 'desc')->paginate(3);
        // $articles = Article::paginate(3);
        return view('articles.index', ['articles' => $articles]);
    }
    // 檢視文章
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }
    // 新增文章
    public function create()
    {
        return view('articles.create');
    }
    // 新增文章後存放的地方
    public function store(Request $request)
    {
        $user = $request->user();

        // if (!auth()->check()) {}
        if (!$user) {
            return redirect()->route('login')->with('error', '請先登入');
        }

        // 驗證文章內容
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10'
        ]);
        $user->articles()->create($content);
        return redirect()->route('articles.index')->with('notice', '文章新增成功!');
        // auth()->user()->articles()->create($content);
        // return redirect()->route('root')->with('notice', '文章新增成功!');
    }

    // 編輯文章
    public function edit($id)
    {
        $user = auth()->user();
        $article = $user->articles()->find($id);
        return view('articles.edit', ['article' => $article]);
    }

    // 更新文章
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $article = $user->articles()->find($id);
        if (!$article) {
            return redirect()->back()->with('error', '文章不存在或無權限');
        }

        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10'
        ]);
        $article->update($content);
        return redirect()->route('articles.index')->with('notice', '文章更新成功!');
    }
    // 刪除文章
    public function destroy(Request $request, $id)
    {
        $user = $request->user();
        if (!$user) {
            return redirect()->route('login')->with('error', '請先登入');
        }
        $article = $user->articles()->find($id);
        // $article = auth()->user()->articles->find($id);
        if (!$article) {
            return redirect()->back()->with('error', '文章不存在或無權限');
        }

        $article->delete();
        return redirect()->route('articles.index')->with('notice', '文章已刪除!');
    }
}
