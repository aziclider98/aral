<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnPost;
use App\Models\RuPost;
use App\Models\UzPost;
use App\Models\QqrPost;
use App\Models\EnCategory;
use App\Models\RuCategory;
use App\Models\UzCategory;
use App\Models\QqrCategory;

class AdminNews extends Controller
{
    public function indexadmin($locale)
    {
        $categories = '';
        $posts = '';
        switch ($locale) {
            case 'en':
                $categories = EnCategory::all();
                $posts = EnPost::orderBy('created_at', 'DESC')->paginate(5);
                break;
            case 'ru':
                $categories = RuCategory::all();
                $posts = RuPost::orderBy('created_at', 'DESC')->paginate(5);
                break;
            case 'uz':
                $categories = UzCategory::all();
                $posts = UzPost::orderBy('created_at', 'DESC')->paginate(5);
                break;
            case 'qqr':
                $categories = QqrCategory::all();
                $posts = QqrPost::orderBy('created_at', 'DESC')->paginate(5);
                break;

            default:
                return abort(404);
                break;
        }
        return view('admin.index.post', compact('posts', 'categories', 'locale'));
    }
    public function indexadmincategory($locale, $id)
    {
        $categories = '';
        $posts = '';
        switch ($locale) {
            case 'en':
                $categories = EnCategory::all();
                $posts = EnCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->paginate(5);
                $category_one = EnCategory::findOrFail($id);
                break;
            case 'ru':
                $categories = RuCategory::all();
                $posts = RuCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->paginate(5);
                $category_one = RuCategory::findOrFail($id);
                break;
            case 'uz':
                $categories = UzCategory::all();
                $posts = UzCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->paginate(5);
                $category_one = UzCategory::findOrFail($id);
                break;
            case 'qqr':
                $categories = QqrCategory::all();
                $posts = QqrCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->paginate(5);
                $category_one = QqrCategory::findOrFail($id);
                break;

            default:
                return abort(404);
                break;
        }
        return view('admin.index.post_category', compact('posts', 'categories', 'category_one', 'locale'));
    }
    public function indexadminshow($locale, $id)
    {
        $categories = '';
        $post = '';
        switch ($locale) {
            case 'en':
                $categories = EnCategory::all();
                $post = EnPost::findOrFail($id);
                break;
            case 'ru':
                $categories = RuCategory::all();
                $post = RuPost::findOrFail($id);
                break;
            case 'uz':
                $categories = UzCategory::all();
                $post = UzPost::findOrFail($id);
                break;
            case 'qqr':
                $categories = QqrCategory::all();
                $post = QqrPost::findOrFail($id);
                break;

            default:
                return abort(404);
                break;
        }
        return view('admin.show', compact('post', 'categories', 'locale'));
    }
}
