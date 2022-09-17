<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnCategory;
use App\Models\RuCategory;
use App\Models\UzCategory;
use App\Models\QqrCategory;
use App\Models\EnPost;
use App\Models\RuPost;
use App\Models\UzPost;
use App\Models\QqrPost;

class News extends Controller
{
    public function index( $locale)
    {
        $categories = '';
        $posts = '';
        switch ($locale) {
            case 'en':
                $categories = EnCategory::all();
                $posts = EnPost::orderBy('created_at', 'DESC')->get();
                break;
            case 'ru':
                $categories = RuCategory::all();
                $posts = RuPost::orderBy('created_at', 'DESC')->get();
                break;
            case 'uz':
                $categories = UzCategory::all();
                $posts = UzPost::orderBy('created_at', 'DESC')->get();
                break;
            case 'qqr':
                $categories = QqrCategory::all();
                $posts = QqrPost::orderBy('created_at', 'DESC')->get();
                break;

            default:
                return abort(404);
                break;
        }
        return view('user.news', compact('posts', 'categories', 'locale'));
    }
    public function indexcategory($locale, $id)
    {
        $categories = '';
        $posts = '';
        switch ($locale) {
            case 'en':
                $categories = EnCategory::all();
                $posts = EnCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->get();
                $category_one = EnCategory::findOrFail($id);
                break;
            case 'ru':
                $categories = RuCategory::all();
                $posts = RuCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->get();
                $category_one = RuCategory::findOrFail($id);
                break;
            case 'uz':
                $categories = UzCategory::all();
                $posts = UzCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->get();
                $category_one = UzCategory::findOrFail($id);
                break;
            case 'qqr':
                $categories = QqrCategory::all();
                $posts = QqrCategory::findOrFail($id)->posts()->orderBy('created_at', 'DESC')->get();
                $category_one = QqrCategory::findOrFail($id);
                break;

            default:
                return abort(404);
                break;
        }
        return view('user.news_category', compact('posts', 'categories', 'category_one', 'locale'));
    }
    public function indexshow($locale, $id)
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
        return view('user.news_show', compact('post', 'categories', 'locale'));
    }
}
