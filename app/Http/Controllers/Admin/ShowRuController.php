<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RuCategory;
use App\Models\RuPost;
class ShowRuController extends Controller
{
    public function index($id)
    {
        $categories = RuCategory::all();
        $post = RuPost::findOrFail($id);
        $cat = 'Ru';
        return view('admin.show', compact('post','categories','cat'));
    }
}
