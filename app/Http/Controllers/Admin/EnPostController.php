<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnCategory;
use App\Models\EnPost;
class EnPostController extends Controller
{
    public function index()
    {
        $categories = EnCategory::all();
        $posts = EnPost::orderBy('created_at', 'DESC')->paginate(5);
        $cat = 'En';
        return view('admin.index.post', compact( 'categories' ,'posts', 'cat'));
    }

}
