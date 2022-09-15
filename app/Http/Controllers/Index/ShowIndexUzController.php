<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UzCategory;
use App\Models\UzPost;
class ShowIndexUzController extends Controller
{
    public function index($id)
    {
        $categories = UzCategory::all();
        $post = UzPost::findOrFail($id);
        $lang = 'Uz';
        return view('user.news_show', compact('post','categories','lang'));
    }
}
