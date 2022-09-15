<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RuCategory;
use App\Models\RuPost;
class ShowIndexRuController extends Controller
{
    public function index($id)
    {
        $categories = RuCategory::all();
        $post = RuPost::findOrFail($id);
        $lang = 'Ru';
        return view('user.news_show', compact('post','categories','lang'));
    }
}
