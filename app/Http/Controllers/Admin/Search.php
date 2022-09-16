<?php

namespace App\Http\Controllers\Admin;

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
class Search extends Controller
{
    public function restoreSearch(Request $request , $locale)
    {
        $search = $request->get('search');
        $posts = '';
        switch ($locale) {
            case 'en':
                $posts = EnPost::onlyTrashed()->where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                break;
            case 'ru':
                $posts = RuPost::onlyTrashed()->where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                break;
            case 'uz':
                $posts = UzPost::onlyTrashed()->where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                break;
            case 'qqr':
                $posts = QqrPost::onlyTrashed()->where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                break;

            default:
                // code...
                break;
        }

        $posts = $posts->paginate($posts->count());
        return view('admin.index.restore', compact( 'posts', 'locale'));
    }

    public function search(Request $request, $locale)
    {
        $search = $request->get('search');
        $posts = '';
        $categories = '';
        switch ($locale) {
            case 'en':
                $posts = EnPost::where('title', 'like', '%'.$search.'%')
                    ->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $categories = EnCategory::all();
                break;
            case 'ru':
                $posts = RuPost::where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $categories = RuCategory::all();
                break;
            case 'uz':
                $posts = UzPost::where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $categories = UzCategory::all();
                break;
            case 'qqr':
                $posts = QqrPost::where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $categories = QqrCategory::all();
                break;
            default:
                // code...
                break;
        }
        return redirect()->back();

    }
    public function searchCategory(Request $request, $locale)
    {
        $search = $request->get('search');
        $id = $request->category_one;
        $posts = '';
        $category_one = '';
        $categories = '';
        switch ($locale) {
            case 'en':
                $posts = EnCategory::findOrFail($id)->posts()->where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $category_one = EnCategory::findOrFail($id);
                $categories = EnCategory::all();
                break;
            case 'ru':

                $posts = RuCategory::findOrFail($id)->posts()->where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $category_one = RuCategory::findOrFail($request->category_one);
                $categories = RuCategory::all();

                break;
            case 'uz':
                $posts = UzCategory::findOrFail($id)->posts()->where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $category_one = UzCategory::findOrFail($request->category_one);
                $categories = UzCategory::all();

                break;
            case 'qqr':

                $posts = QqrCategory::findOrFail($id)->posts()->where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $category_one = QqrCategory::findOrFail($request->category_one);
                $categories = QqrCategory::all();

                break;
            default:
                // code...
                break;
        }
        return view('admin.index.post_category', compact( 'categories' ,'posts', 'category_one' , 'locale'));

    }

}
