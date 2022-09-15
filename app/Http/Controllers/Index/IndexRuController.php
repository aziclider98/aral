<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RuPost;
use App\Models\RuCategory;
class IndexRuController extends Controller
{
    public function index()
    {
        $categories = RuCategory::all();
        $posts = RuPost::orderBy('created_at', 'DESC')->get();
        $lang = 'Ru';
        return view('user.news', compact('posts', 'categories', 'lang'));
    }
}
