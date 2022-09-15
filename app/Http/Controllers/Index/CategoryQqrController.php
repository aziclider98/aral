<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QqrCategory;
use App\Models\QqrPost;
class CategoryQqrController extends Controller
{
    public function index($id)
    {
        $categories = QqrCategory::all();
        $posts = QqrCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->get();
        $category_one = QqrCategory::findOrFail($id);
        $lang = 'Qqr';
        return view('user.news_category', compact('categories', 'posts', 'category_one', 'lang'));
    }

}
