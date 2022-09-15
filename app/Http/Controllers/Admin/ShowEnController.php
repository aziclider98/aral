<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnCategory;
use App\Models\EnPost;
class ShowEnController extends Controller
{
    public function index($id)
    {
        $categories = EnCategory::all();
        $post = EnPost::findOrFail($id);
        $cat = 'En';
        return view('admin.show', compact('post','categories','cat'));
    }
}
