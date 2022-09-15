<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UzPost;
use App\Models\UzCategory;
class IndexUzController extends Controller
{
    public function index()
    {
        $categories = UzCategory::all();
        $posts = UzPost::orderBy('created_at', 'DESC')->get();
        $lang = 'Uz';
        return view('user.news', compact('posts', 'categories', 'lang'));
    }
}
