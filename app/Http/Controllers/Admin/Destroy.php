<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\EnPost;
use App\Models\RuPost;
use App\Models\UzPost;
use App\Models\QqrPost;
class Destroy extends Controller
{
    public function destroy($locale, $id)
    {
        $en_post = EnPost::findOrFail($id);
        $ru_post = RuPost::findOrFail($id);
        $uz_post = UzPost::findOrFail($id);
        $qqr_post = QqrPost::findOrFail($id);

        $en_post->delete();
        $ru_post->delete();
        $uz_post->delete();
        $qqr_post->delete();
        alert()->success('Success','Post successfully deleted')->persistent('Close')->autoclose(5500);
        return redirect()->back(compact('locale'));
    }
}
