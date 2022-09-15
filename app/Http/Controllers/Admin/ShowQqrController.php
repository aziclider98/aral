<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QqrCategory;
use App\Models\QqrPost;
class ShowQqrController extends Controller
{
    public function index($id)
    {
        $categories = QqrCategory::all();
        $post = QqrPost::findOrFail($id);
        $cat = 'Qqr';
        return view('admin.show', compact('post','categories', 'cat'));
    }
}
