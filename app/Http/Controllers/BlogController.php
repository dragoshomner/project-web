<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(1);
        return view('home')->with('articles', $articles);
    }
}
