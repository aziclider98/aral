<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RuCategory;
use App\Models\RuPost;

class RuPostController extends Controller
{
    public function index()
    {
        $categories = RuCategory::all();
        $posts = RuPost::orderBy('created_at', 'DESC')->paginate(5);
        $cat = 'Ru';
        return view('admin.index.post', compact( 'categories' ,'posts', 'cat'));
    }

}
