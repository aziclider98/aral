<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UzCategory;
use App\Models\UzPost;
class ShowUzController extends Controller
{
    public function index($id)
    {
        $categories = UzCategory::all();
        $post = UzPost::findOrFail($id);
        $cat = 'Uz';
        return view('admin.show', compact('post','categories','cat'));
    }
}
