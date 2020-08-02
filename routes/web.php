<?php
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
    return view('welcome');
});

Auth::routes();//./vendor/laravel/ui/src/AuthRouteMethods.php (+- 19)

Route::get('/profile', function(){
    return __('Profile');
})->name('web.profile.get.home');

Route::get('/logout', 'Auth\LoginController@logout')->name('web.auth.get.logout');
Route::get('/account_created', 'Auth\RegisterController@account_created')->name('web.auth.post.account_created');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('setlocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales')))
    {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('setlocale');
