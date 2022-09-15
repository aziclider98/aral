<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QqrCategory;
use App\Models\QqrPost;

class QqrPostController extends Controller
{
    public function index()
    {
        $categories = QqrCategory::all();
        $posts = QqrPost::orderBy('created_at', 'DESC')->paginate(5);
        $cat = 'Qqr';
        return view('admin.index.post', compact( 'categories' ,'posts', 'cat'));
    }

}
