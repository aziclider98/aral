<?php

use Illuminate\Support\Facades\Route;
// Admin
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\EnPostController;
use App\Http\Controllers\Admin\RuPostController;
use App\Http\Controllers\Admin\UzPostController;
use App\Http\Controllers\Admin\QqrPostController;
use App\Http\Controllers\Admin\EnCategoryController;
use App\Http\Controllers\Admin\RuCategoryController;
use App\Http\Controllers\Admin\UzCategoryController;
use App\Http\Controllers\Admin\QqrCategoryController;
use App\Http\Controllers\Admin\ShowEnController;
use App\Http\Controllers\Admin\ShowRuController;
use App\Http\Controllers\Admin\ShowUzController;
use App\Http\Controllers\Admin\ShowQqrController;
//User
use App\Http\Controllers\Index\CategoryEnController;
use App\Http\Controllers\Index\CategoryRuController;
use App\Http\Controllers\Index\CategoryUzController;
use App\Http\Controllers\Index\CategoryQqrController;
use App\Http\Controllers\Index\IndexEnController;
use App\Http\Controllers\Index\IndexRuController;
use App\Http\Controllers\Index\IndexUzController;
use App\Http\Controllers\Index\IndexQqrController;
use App\Http\Controllers\Index\ShowIndexEnController;
use App\Http\Controllers\Index\ShowIndexRuController;
use App\Http\Controllers\Index\ShowIndexUzController;
use App\Http\Controllers\Index\ShowIndexQqrController;



Route::get('/' , [IndexEnController::class, 'index'])->name("userhome");
Route::prefix('news')->group( function(){
    Route::get('/en', [IndexEnController::class, 'index'])->name('newsen');
    Route::get('/ru', [IndexRuController::class, 'index'])->name('newsru');
    Route::get('/uz', [IndexUzController::class, 'index'])->name('newsuz');
    Route::get('/qqr', [IndexQqrController::class, 'index'])->name('newsqqr');

    Route::get('/en/category/{id}', [CategoryEnController::class, 'index'])->name('newsencategories');
    Route::get('/ru/category/{id}', [CategoryRuController::class, 'index'])->name('newsrucategories');
    Route::get('/uz/category/{id}', [CategoryUzController::class, 'index'])->name('newsuzcategories');
    Route::get('/qqr/category/{id}', [CategoryQqrController::class, 'index'])->name('newsqqrcategories');

    Route::get('/en/show/{id}',[ShowIndexEnController::class, 'index'])->name('indexshowenpost');
    Route::get('/ru/show/{id}',[ShowIndexRuController::class, 'index'])->name('indexshowrupost');
    Route::get('/uz/show/{id}',[ShowIndexUzController::class, 'index'])->name('indexshowuzpost');
    Route::get('/qqr/show/{id}',[ShowIndexQqrController::class, 'index'])->name('indexshowqqrpost');
});
Auth::routes();

// Admin
Route::group(['middleware' => ['role:admin']], function () {
    // Settings
    Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'edit'])->name('editSettings');
    Route::post('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('updateSettings');
    Route::put('/settings/admin/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'nameEmailUpdate'])->name('infoupdate');

    // Post resource
    Route::resource('posts', PostController::class);


    Route::prefix('post')->group( function(){
        //Search Post
        Route::get('/search', [PostController::class, 'search'])->name('search');
        Route::get('/search/category', [PostController::class, 'searchCategory'])->name('searchcategory');
        Route::get('/search/restore', [PostController::class, 'restoreSearch'])->name('restore.search');

        // ReStore Post
        Route::get('/restore', [PostController::class, 'restore'])->name('restore');
        Route::get('/restore/post/{id}', [PostController::class, 'restoreOne'])->name('restore.one');
        Route::get('/restore/all', [PostController::class, 'restoreAll'])->name('restore.all');

        Route::get('/en',[EnPostController::class, 'index'])->name('enposts');
        Route::get('/en/category/{id}',[EnCategoryController::class, 'index'])->name('encategories');
        Route::get('/en/show/{id}',[ShowEnController::class, 'index'])->name('showenposts');

        Route::get('/ru',[RuPostController::class, 'index'])->name('ruposts');
        Route::get('/ru/category/{id}',[RuCategoryController::class, 'index'])->name('rucategories');
        Route::get('/ru/show/{id}',[ShowRuController::class, 'index'])->name('showruposts');

        Route::get('/uz',[UzPostController::class, 'index'])->name('uzposts');
        Route::get('/uz/category/{id}',[UzCategoryController::class, 'index'])->name('uzcategories');
        Route::get('/uz/show/{id}',[ShowUzController::class, 'index'])->name('showuzposts');

        Route::get('/qqr',[QqrPostController::class, 'index'])->name('qqrposts');
        Route::get('/qqr/category/{id}',[QqrCategoryController::class, 'index'])->name('qqrcategories');
        Route::get('/qqr/show/{id}',[ShowQqrController::class, 'index'])->name('showqqrposts');
    });
});
