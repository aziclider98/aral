<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RuCategory;
class RuCategoryController extends Controller
{
    public function index($id)
    {
        $categories = RuCategory::all();
        $posts = RuCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->paginate(5);
        $cat = 'Ru';
        $category_one = RuCategory::findOrFail($id);
        return view('admin.index.post_category', compact('categories', 'posts', 'category_one', 'cat'));
    }

}
