<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index()
    {

        return view('articles.index');
    }
    public function create()
    {
        return view('articles.create');
    }
}
