<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\PostRequest;
use App\Models\EnCategory;
use App\Models\RuCategory;
use App\Models\UzCategory;
use App\Models\QqrCategory;
use App\Models\EnPost;
use App\Models\RuPost;
use App\Models\UzPost;
use App\Models\QqrPost;
class Create extends Controller
{
    public function create($locale)
    {
        $en_categories = EnCategory::all();
        return view('admin.create', compact('en_categories', 'locale'));
    }
    public function store(PostRequest $request, $locale)
    {
        $en_post = new EnPost();
        $ru_post = new RuPost();
        $uz_post = new UzPost();
        $qqr_post = new QqrPost();

        $data = $request->validated();

        if ($request->hasFile('post_image')) {
            $fileNameWithExt = $data['post_image']->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $data['post_image']->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $data['post_image']->storeAs('public/images', $fileNameToStore);

            //IMAGE POST
            $en_post->image = $fileNameToStore;
            $ru_post->image = $fileNameToStore;
            $uz_post->image = $fileNameToStore;
            $qqr_post->image = $fileNameToStore;
        }

        //CATEGORY_ID POSTS
        $en_post->en_category_id = $data['category_id'];
        $ru_post->ru_category_id = $data['category_id'];
        $uz_post->uz_category_id = $data['category_id'];
        $qqr_post->qqr_category_id = $data['category_id'];

        //TITLE POST
        $en_post->title = $data['en_title'];
        $ru_post->title = $data['ru_title'];
        $uz_post->title = $data['uz_title'];
        $qqr_post->title = $data['qqr_title'];

        //TEXT POST
        $en_post->text = $data['en_text'];
        $ru_post->text = $data['ru_text'];
        $uz_post->text = $data['uz_text'];
        $qqr_post->text = $data['qqr_text'];



        $en_post->save();
        $ru_post->save();
        $uz_post->save();
        $qqr_post->save();
        alert()->success('Success','Post successfully created')->persistent('Close')->autoclose(5500);
        return redirect()->route('news', 'locale');
    }
}
