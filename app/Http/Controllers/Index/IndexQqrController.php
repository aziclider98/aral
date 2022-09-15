<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QqrPost;
use App\Models\QqrCategory;
class IndexQqrController extends Controller
{
    public function index()
    {
        $categories = QqrCategory::all();
        $posts = QqrPost::orderBy('created_at', 'DESC')->get();
        $lang = 'Qqr';
        return view('user.news', compact('posts', 'categories', 'lang'));
    }
}
