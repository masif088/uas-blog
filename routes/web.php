<?php

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

use App\Blog;
use App\User;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('blog', 'ClientSiteController@blogIndex')->name('blogIndex');
Route::get('blog/category/{category}', 'ClientSiteController@blogCategory')->name('blogCategory');
Route::post('blog/search/', 'ClientSiteController@blogSearchPost')->name('blogSearchPost');
Route::get('blog/search/{search}', 'ClientSiteController@blogSearch')->name('blogSearch');
Route::get('blog/{slug}', 'ClientSiteController@blogShow')->name('blogShow');
Route::post('blog/{slug}', 'ClientSiteController@blogComment')->name('blogComment');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('log-out');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return redirect(route('blogIndex'));
})->name('home');
Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::resource('blog', 'Admin\BlogController');
    Route::resource('tag', 'Admin\TagController');
    Route::resource('user', 'Admin\UserController');
    Route::get('dashboard', function () {
        if (Auth::user()->role == 1) {
            $blogWaiting = Blog::whereStatus(0)->count();
            $blogPublished = Blog::whereStatus(1)->count();
            $blog = Blog::count();
        }else{
            $blogWaiting = Blog::whereStatus(0)->whereUserId(Auth::id())->count();
            $blogPublished = Blog::whereStatus(1)->whereUserId(Auth::id())->count();
            $blog = Blog::count();
        }
        $user = User::get()->count();
        return view('admin.dashboard', compact('blog','blogWaiting','blogPublished', 'user'));
    })->name('dashboard');
});
