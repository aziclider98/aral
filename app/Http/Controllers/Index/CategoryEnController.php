<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnCategory;
class CategoryEnController extends Controller
{
    public function index($id)
    {
        $categories = EnCategory::all();
        $posts = EnCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->get();
        $category_one = EnCategory::findOrFail($id);
        $lang = 'En';
        return view('user.news_category', compact( 'categories' ,'posts', 'category_one', 'lang'));
    }

}
