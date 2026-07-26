<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LeadsController;
use UniSharp\LaravelFilemanager\Lfm;

// Route::prefix('manager')->middleware(['web', 'auth'])
//     ->group(function () {
//         Route::get('/', function () {
//             return view('manager/index');
//         });
//         Route::resource('posts', ManagerPostsController::class);

//         Route::post('/posts/{post}/upload_preview', [ManagerPostsController::class, 'upload_preview']);
//         Route::delete('/posts/{mediaId}/destroy_preview', [ManagerPostsController::class, 'destroy_preview']);

//         Route::post('/posts/{post}/upload_content_image', [ManagerPostsController::class, 'upload_content_image']);
//         Route::delete('/posts/{mediaId}/destroy_content_image', [ManagerPostsController::class, 'destroy_content_image']);
//     });

 Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        Lfm::routes();
    });

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::view('/', 'home.index');
    Route::view('/about', 'home.about');
    Route::view('/contacts', 'home.contacts');
    Route::post('/leads', [LeadsController::class, 'store']);
    // Route::get('/{category}', [PostsController::class, 'category']);
    // Route::get('/posts/{post}', [PostsController::class, 'show'])->name('post');
});



