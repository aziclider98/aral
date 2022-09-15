<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QqrCategory;
use App\Models\QqrPost;
class ShowIndexQqrController extends Controller
{
    public function index($id)
    {
        $categories = QqrCategory::all();
        $post = QqrPost::findOrFail($id);
        $lang = 'Qqr';
        return view('user.news_show', compact('post','categories', 'lang'));
    }
}
