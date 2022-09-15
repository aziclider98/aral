<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnCategory;
class EnCategoryController extends Controller
{
    public function index($id)
    {
        $categories = EnCategory::all();
        $posts = EnCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->paginate(5);
        $category_one = EnCategory::findOrFail($id);
        $cat = 'En';
        return view('admin.index.post_category', compact('categories', 'posts', 'category_one', 'cat'));
    }

}
