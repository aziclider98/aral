<?php

use Illuminate\Support\Facades\Route;
// Admin
use App\Http\Controllers\Admin\PostController;

use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\AdminNews;
use App\Http\Controllers\Admin\Create;
use App\Http\Controllers\Admin\Update;
use App\Http\Controllers\Admin\Destroy;
use App\Http\Controllers\Admin\Restore;
use App\Http\Controllers\Admin\Search;
//User


use App\Http\Controllers\Index\News;


Auth::routes();

// Admin

    Route::group([ 'prefix' => '{locale}/admin', 'middleware' => ['role:admin']], function () {
        // Settings

        Route::get('/settings', [SettingsController::class, 'edit'])->name('editSettings');
        Route::post('/settings', [SettingsController::class, 'update'])->name('updateSettings');
        Route::put('/settings/admin/{id}', [SettingsController::class, 'nameEmailUpdate'])->name('infoupdate');

        // CRUD posts
        // C
        Route::get('/create', [Create::class, 'create'])->name('createpost')->middleware('setLocale');
        Route::post('/store', [Create::class, 'store'])->name('storepost')->middleware('setLocale');
        // E
        Route::get('/edit/{id}', [Update::class, 'edit'])->name('editpost')->middleware('setLocale');
        Route::put('/update/{id}', [Update::class, 'update'])->name('updatepost')->middleware('setLocale');
        // D
        Route::delete('/delete/{id}', [Destroy::class, 'destroy'])->name('destroy')->middleware('setLocale');

        Route::resource('posts', PostController::class);

        Route::prefix('post')->group( function(){
            //Search Post
            Route::get('/search', [Search::class, 'search'])->name('search');
            Route::get('/search/category', [Search::class, 'searchCategory'])->name('searchcategory');
            Route::get('/search/restore', [Search::class, 'restoreSearch'])->name('restore.search');

            // ReStore Post
            Route::get('/restore', [Restore::class, 'restore'])->name('restore');
            Route::get('/restore/post/{id}', [Restore::class, 'restoreOne'])->name('restore.one');
            Route::get('/restore/all', [Restore::class, 'restoreAll'])->name('restore.all');


            Route::get('/',[AdminNews::class, 'indexadmin'])->name('adminnews')->middleware('setLocale');
            Route::get('/category/{id}',[AdminNews::class, 'indexadmincategory'])->name('indexadmincategory')->middleware('setLocale');
            Route::get('/show/{id}',[AdminNews::class, 'indexadminshow'])->name('indexadminshow')->middleware('setLocale');

        });
    });
// User


Route::group(['prefix' => '{locale}'], function(){
    Route::get('/', [News::class, 'index'])->name('news')->middleware('setLocale');
    Route::get('/category/{id}', [News::class, 'indexcategory'])->name('newscategory')->middleware('setLocale');
    Route::get('/news/{id}',[News::class, 'indexshow'])->name('indexshow')->middleware('setLocale');

});


