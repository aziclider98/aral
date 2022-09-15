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

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $en_categories = EnCategory::all();
        return view('admin.create', compact('en_categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(PostRequest $request)
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
        return redirect()->route('userhome');
    }

    public function restore()
    {
        $posts = EnPost::select("*")->orderBy('created_at', 'DESC');
        $cat = 'En';
        $posts = $posts->onlyTrashed();
        $posts = $posts->paginate(5);

        return view('admin.index.restore', compact('posts', 'cat'));
    }
    public function restoreOne($id)
    {
        EnPost::withTrashed()->findOrFail($id)->restore();
        RuPost::withTrashed()->findOrFail($id)->restore();
        UzPost::withTrashed()->findOrFail($id)->restore();
        QqrPost::withTrashed()->findOrFail($id)->restore();
        alert()->success('Success','Post successfully restored')->persistent('Close')->autoclose(5500);
        return back();
    }
    public function restoreAll()
    {
        EnPost::onlyTrashed()->restore();
        RuPost::onlyTrashed()->restore();
        UzPost::onlyTrashed()->restore();
        QqrPost::onlyTrashed()->restore();
        alert()->success('Success','All Post successfully restored')->persistent('Close')->autoclose(5500);
        return back();
    }
    public function restoreSearch(Request $request)
    {
        $search = $request->get('search');
        $posts = EnPost::onlyTrashed()->where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
        $posts = $posts->paginate($posts->count());
        $cat = 'En';
        return view('admin.index.restore', compact( 'posts', 'cat'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        switch ($request->lang) {
            case 'En':
                $posts = EnPost::where('title', 'like', '%'.$search.'%')
                    ->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $categories = EnCategory::all();
                $cat = 'En';
                return view('admin.index.post', compact( 'categories' ,'posts', 'cat'));
                break;
            case 'Ru':
                $posts = RuPost::where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $cat = 'Ru';
                $categories = RuCategory::all();
                return view('admin.index.post', compact( 'categories' ,'posts', 'cat'));
                break;
            case 'Uz':
                $posts = UzPost::where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $cat = 'Uz';
                $categories = UzCategory::all();
                return view('admin.index.post', compact( 'categories' ,'posts', 'cat'));
                break;
            case 'Qqr':
                $posts = QqrPost::where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $cat = 'Qqr';
                $categories = QqrCategory::all();
                return view('admin.index.post', compact( 'categories' ,'posts', 'cat'));
                break;
            default:
                // code...
                break;
        }
    }
    public function searchCategory(Request $request)
    {
        $search = $request->get('search');
        $id = $request->category_one;
        switch ($request->lang) {
            case 'En':
                $posts = EnCategory::findOrFail($id)->posts()->where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $category_one = EnCategory::findOrFail($id);
                $cat = 'En';
                $categories = EnCategory::all();

                return view('admin.index.post_category', compact( 'categories' ,'posts', 'cat', 'category_one'));
                break;
            case 'Ru':

                $posts = RuCategory::findOrFail($id)->posts()->where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $category_one = RuCategory::findOrFail($request->category_one);
                $cat = 'Ru';
                $categories = RuCategory::all();

                return view('admin.index.post_category', compact( 'categories' ,'posts', 'cat', 'category_one'));
                break;
            case 'Uz':
                $posts = UzCategory::findOrFail($id)->posts()->where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $cat = 'Uz';
                $category_one = UzCategory::findOrFail($request->category_one);
                $categories = UzCategory::all();

                return view('admin.index.post_category', compact( 'categories' ,'posts', 'cat', 'category_one'));
                break;
            case 'Qqr':

                $posts = QqrCategory::findOrFail($id)->posts()->where('title', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC');
                $posts = $posts->paginate($posts->count());
                $category_one = QqrCategory::findOrFail($request->category_one);
                $cat = 'Qqr';
                $categories = QqrCategory::all();

                return view('admin.index.post_category', compact( 'categories' ,'posts', 'cat', 'category_one'));
                break;
            default:
                // code...
                break;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $en_post = EnPost::findOrFail($id);
        $ru_post = RuPost::findOrFail($id);
        $uz_post = UzPost::findOrFail($id);
        $qqr_post = QqrPost::findOrFail($id);

        $en_categories = EnCategory::all();

        return view('admin.edit', compact('en_post', 'ru_post' , 'uz_post', 'qqr_post', 'en_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $en_post = EnPost::findOrFail($id);
        $ru_post = RuPost::findOrFail($id);
        $uz_post = UzPost::findOrFail($id);
        $qqr_post = QqrPost::findOrFail($id);

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
        alert()->success('Success','Post successfully updated')->persistent('Close')->autoclose(5500);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
        return redirect()->back();
    }
}
