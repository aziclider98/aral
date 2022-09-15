<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RuCategory;
use App\Models\RuPost;
class CategoryRuController extends Controller
{
    public function index($id)
    {
        $categories = RuCategory::all();
        $posts = RuCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->get();
        $category_one = RuCategory::findOrFail($id);
        $lang = 'Ru';
        return view('user.news_category', compact('categories', 'posts', 'category_one', 'lang'));
    }

}
