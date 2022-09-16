<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\PostRequest;

use App\Models\EnPost;
use App\Models\RuPost;
use App\Models\UzPost;
use App\Models\QqrPost;

class Restore extends Controller
{
    public function restore($locale)
    {
        $posts = '';
        switch ($locale) {
            case 'en':
                $posts = EnPost::select("*")->orderBy('created_at', 'DESC');
                break;
            case 'ru':
                $posts = RuPost::select("*")->orderBy('created_at', 'DESC');
                break;
            case 'uz':
                $posts = UzPost::select("*")->orderBy('created_at', 'DESC');
                break;
            case 'qqr':
                $posts = QqrPost::select("*")->orderBy('created_at', 'DESC');
                break;

            default:
                // code...
                break;
        }
        $posts = $posts->onlyTrashed();
        $posts = $posts->paginate(5);

        return view('admin.index.restore', compact('posts', 'locale'));
    }
    public function restoreOne($locale,$id)
    {
        EnPost::withTrashed()->findOrFail($id)->restore();
        RuPost::withTrashed()->findOrFail($id)->restore();
        UzPost::withTrashed()->findOrFail($id)->restore();
        QqrPost::withTrashed()->findOrFail($id)->restore();
        alert()->success('Success','Post successfully restored')->persistent('Close')->autoclose(5500);
        return back(compact('locale'));
    }
    public function restoreAll($locale)
    {
        EnPost::onlyTrashed()->restore();
        RuPost::onlyTrashed()->restore();
        UzPost::onlyTrashed()->restore();
        QqrPost::onlyTrashed()->restore();
        alert()->success('Success','All Post successfully restored')->persistent('Close')->autoclose(5500);
        return back(compact('locale'));
    }
}
