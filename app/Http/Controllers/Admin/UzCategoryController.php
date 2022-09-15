<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UzCategory;
class UzCategoryController extends Controller
{
    public function index($id)
    {
        $categories = UzCategory::all();
        $posts = UzCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->paginate(5);
        $cat = 'Uz';
        $category_one = UzCategory::findOrFail($id);
        return view('admin.index.post_category', compact('categories', 'posts', 'category_one', 'cat'));
    }

}
