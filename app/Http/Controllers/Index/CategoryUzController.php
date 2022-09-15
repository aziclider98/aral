<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UzCategory;
use App\Models\UzPost;
class CategoryUzController extends Controller
{
    public function index($id)
    {
        $categories = UzCategory::all();
        $posts = UzCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->get();
        $category_one = UzCategory::findOrFail($id);
        $lang = 'Uz';
        return view('user.news_category', compact('categories', 'posts', 'category_one', 'lang'));
    }

}
