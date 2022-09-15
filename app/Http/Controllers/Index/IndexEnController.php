<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnPost;
use App\Models\EnCategory;

class IndexEnController extends Controller
{
    public function index()
    {
        $categories = EnCategory::all();
        $posts = EnPost::orderBy('created_at', 'DESC')->get();
        $lang = 'En';
        return view('user.news', compact('posts', 'categories', 'lang'));
    }
}
