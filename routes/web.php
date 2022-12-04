<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AllPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PemilikHewanController;
use App\Http\Controllers\VetControllr;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome',[
        'title' => "Home",
        'active' => "home",
        'posts' => Post::latest()->paginate(3)->withQueryString()
    ]);
})->name('home');

Route::get('/dashboard/', [DashboardController::class, 'index'])->middleware('auth');

Route::get('team', function () {
    return view('team',[
        'title' => "Team",
        'active' => "team"
    ]);
})->name('team');

Route::get('contact', function () {
    return view('contact',[
        'title' => "Contact",
        'active' => "contact"
    ]);
})->name('contact');

Route::get('drh', function () {
    return view('drh',[
        'title' => "drh",
        'active' => "partner"
    ]);
})->name('drh');

Route::get('iklan', function () {
    return view('iklan',[
        'title' => "iklan",
        'active' => "partner"
    ]);
})->name('iklan');


Route::get('about', function () {
    return view('about',[
        'title' => "About",
        'active' => "about"
    ]);
})->name('about');

Route::get('faq', function () {
    return view('FAQ',[
        'title' => "FAQ",
        'active' => "faq"
    ]);
})->name('faq');

Route::resource('/dashboard/pemilik-hewan', PemilikHewanController::class);

Route::get('/dashboard/dokter-hewan',function(){
    return view('dashboard.drh.index',[
        'title' => "Dokter Hewan"
    ]);
});
Route::resource('/dashboard/dokter-hewan', VetControllr::class);


Route::get('/dashboard/tarik-saldo',function(){
    return view('dashboard.drh.saldo',[
        'title' => "Permintaan Penarikan Saldo"
    ]);
});

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
Route::resource('/dashboard/posts', DashboardPostController::class);

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug']);
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/users/createpw', [AdminUserController::class, 'createpw']);
Route::resource('/dashboard/users', AdminUserController::class)->except('show')->middleware('admin');

Route::resource('/dashboard/all-post', AllPostController::class)->middleware('admin');

Route::post('/contact/send',[MessageController::class, 'store']);

Route::resource('/dashboard/message', MessageController::class)->except('show')->middleware('admin');

Route::get('/dashboard/message/{id}/delete',[MessageController::class, 'destroy']);

Auth::routes();

Route::get('/coba', [VetControllr::class, 'index']);


