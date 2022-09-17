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
        $messagealert = '';
        switch ($locale) {
            case 'en':
                $messagealert = 'News successfully restored';
                break;
            case 'ru':
                $messagealert = 'Новости успешно восстановлены';
                break;
            case 'uz':
                $messagealert = 'Yangilik muvaffaqiyatli tiklandi';
                break;
            case 'qqr':
                $messagealert = 'Jańalıq tabıslı tiklendi';
                break;
        }
        alert()->success('Success',$messagealert)->persistent('Close')->autoclose(5500);
        return back();
    }
    public function restoreAll($locale)
    {
        EnPost::onlyTrashed()->restore();
        RuPost::onlyTrashed()->restore();
        UzPost::onlyTrashed()->restore();
        QqrPost::onlyTrashed()->restore();
        $messagealert = '';
        switch ($locale) {
            case 'en':
                $messagealert = 'All News successfully restored';
                break;
            case 'ru':
                $messagealert = 'Все новости успешно восстановлены';
                break;
            case 'uz':
                $messagealert = 'Barcha yangiliklar muvaffaqiyatli tiklandi';
                break;
            case 'qqr':
                $messagealert = 'Barlıq jańalıqlar tabıslı tiklendi';
                break;
        }
        alert()->success('Success',$messagealert)->persistent('Close')->autoclose(5500);
        return back();
    }
}
