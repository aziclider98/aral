<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QqrCategory;
class QqrCategoryController extends Controller
{
    public function index($id)
    {
        $categories = QqrCategory::all();
        $posts = QqrCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->paginate(5);
        $cat = 'Qqr';
        $category_one = QqrCategory::findOrFail($id);
        return view('admin.index.post_category', compact('categories', 'posts', 'category_one', 'cat'));
    }

}
