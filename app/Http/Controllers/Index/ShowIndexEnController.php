<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnCategory;
use App\Models\EnPost;
class ShowIndexEnController extends Controller
{
    public function index($id)
    {
        $categories = EnCategory::all();
        $post = EnPost::findOrFail($id);
        $lang = 'En';
        return view('user.news_show', compact('post','categories','lang'));
    }
}
