<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::group(['middleware' => ['web']], function () {

//     Route::post('/signup', [
//         'uses' => 'UserController@postSingUp',
//         'as' => 'signup'
//     ]);
// });

Route::get('/', function () {
    return view('welcome');
})->name('home');
// ----------------------optimize and used Route::controller group-------->
Route::controller(UserController::class)->group(function () {
    Route::post('/signup',  'postSingUp')->name('signup');
    Route::post('/signin',  'postSingIn')->name('signin');
    Route::get('/logout', 'getLogout')->name('logout');
    Route::get('/account',  'getAccount')->name('account');
    Route::post('/updateaccount',  'postSaveAccount')->name('account.save');

    Route::get('/userimage/{filename}', 'getUserImage')->name('account.image');
});

// Route::post('/signup', [
//     UserController::class, 'postSingUp'
// ])->name('signup');

// Route::post('/signin', [
//     UserController::class, 'postSingIn'
// ])->name('signin');

// Route::get('/logout', [
//     UserController::class, 'getLogout'
// ])->name('logout');

// Route::get('/account', [
//     UserController::class, 'getAccount'
// ])->name('account');

// Route::post('/updateaccount', [
//     UserController::class, 'postSaveAccount'
// ])->name('account.save');

// Route::get('/userimage/{filename}', [
//     UserController::class, 'getUserImage'
// ])->name('account.image');
// ---------------------- end optimize and used Route::controller group-------->
Route::get('/dashboard', [
    PostController::class, 'getDashboard'
])->name('dashboard')
    ->middleware('auth');

Route::post('/createpost', [
    PostController::class, 'postCreatePost'
])->name('post.create')
    ->middleware('auth');

Route::get('/post-delete/{post_id}', [
    PostController::class, 'getDeletePost'
])->name('post.delete')
    ->middleware('auth');
Route::post('/edit', [
    PostController::class, 'postEditPost'
])->name('edit');


Route::post('/like', [
    PostController::class, 'postLikePost'
])->name('like');
