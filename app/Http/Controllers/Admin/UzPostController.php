<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UzCategory;
use App\Models\UzPost;
class UzPostController extends Controller
{
    public function index()
    {
        $categories = UzCategory::all();
        $posts = UzPost::orderBy('created_at', 'DESC')->paginate(5);
        $cat = 'Uz';
        return view('admin.index.post', compact( 'categories' ,'posts', 'cat'));
    }
}
