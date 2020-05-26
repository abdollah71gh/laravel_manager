<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);
Route::post('/comment/{article}', 'front\CommentController@store')->name('comment.store');

Route::prefix('admin/portfolios')->middleware('checkrole')->group(function () {
    Route::get('/', 'back\PortfolioController@index')->name('admin.portfolios');
    Route::get('/create', 'back\PortfolioController@create')->name('admin.portfolios.create');
    Route::post('/store', 'back\PortfolioController@store')->name('admin.portfolios.store');
    Route::get('/edit/{portfolio}', 'back\PortfolioController@edit')->name('admin.portfolios.edit');
    Route::post('/update/{portfolio}', 'back\PortfolioController@update')->name('admin.portfolios.update');
    Route::get('/destroy/{portfolio}', 'back\PortfolioController@destroy')->name('admin.portfolios.destroy');
    Route::get('/status/{portfolio}', 'back\PortfolioController@updatstatus')->name('admin.portfolios.status');
});
Route::prefix('admin/teams')->middleware('checkrole')->group(function () {
    Route::get('/', 'back\TeamController@index')->name('admin.teams');
    Route::get('/create', 'back\TeamController@create')->name('admin.teams.create');
    Route::post('/store', 'back\TeamController@store')->name('admin.teams.store');
    Route::get('/edit/{team}', 'back\TeamController@edit')->name('admin.teams.edit');
    Route::post('/update/{team}', 'back\TeamController@update')->name('admin.teams.update');
    Route::get('/destroy/{team}', 'back\TeamController@destroy')->name('admin.teams.destroy');
    Route::get('/status/{team}', 'back\TeamController@updatstatus')->name('admin.teams.status');
});


Route::prefix('admin/manigers')->middleware('checkrole')->group(function () {
    Route::get('/', 'back\ManigerController@index')->name('admin.manigers');
    Route::get('/create', 'back\ManigerController@create')->name('admin.manigers.create');
    Route::post('/store', 'back\ManigerController@store')->name('admin.manigers.store');
    Route::get('/edit/{maniger}', 'back\ManigerController@edit')->name('admin.manigers.edit');
    Route::post('/update/{maniger}', 'back\ManigerController@update')->name('admin.manigers.update');
    Route::get('/destroy/{maniger}', 'back\ManigerController@destroy')->name('admin.manigers.destroy');
    Route::get('/status/{maniger}', 'back\ManigerController@updatstatus')->name('admin.manigers.status');
});

Route::prefix('admin/abouts')->middleware('checkrole')->group(function () {
    Route::get('/', 'back\AboutController@index')->name('admin.abouts');
    Route::get('/create', 'back\AboutController@create')->name('admin.abouts.create');
    Route::post('/store', 'back\AboutController@store')->name('admin.abouts.store');
    Route::get('/edit/{about}', 'back\AboutController@edit')->name('admin.abouts.edit');
    Route::post('/update/{about}', 'back\AboutController@update')->name('admin.abouts.update');
    Route::get('/destroy/{about}', 'back\AboutController@destroy')->name('admin.abouts.destroy');
    Route::get('/status/{about}', 'back\AboutController@updatstatus')->name('admin.abouts.status');
});

Route::prefix('admin/skills')->middleware('checkrole')->group(function () {
    Route::get('/', 'back\SkillController@index')->name('admin.skills');
    Route::get('/create', 'back\SkillController@create')->name('admin.skills.create');
    Route::post('/store', 'back\SkillController@store')->name('admin.skills.store');
    Route::get('/edit/{skill}', 'back\SkillController@edit')->name('admin.skills.edit');
    Route::post('/update/{skill}', 'back\SkillController@update')->name('admin.skills.update');
    Route::get('/destroy/{skill}', 'back\SkillController@destroy')->name('admin.skills.destroy');
    Route::get('/status/{skill}', 'back\SkillController@updatstatus')->name('admin.skills.status');
});




Route::prefix('admin')->middleware('checkrole')->group(function () {
    Route::get('/', 'back\AdminController@index')->name('admin.index');
    Route::get('/users', 'back\UserController@index')->name('admin.users');
    Route::get('/profile{user}', 'back\UserController@edit')->name('admin.profile');
    Route::post('/profileupdate{user}', 'back\UserController@update')->name('admin.profileupdate');
    Route::get('/user/delete/{user}', 'back\UserController@destroy')->name('admin.user.delete');
    Route::get('/user/status/{user}', 'back\UserController@updatstatus')->name('admin.user.status');
});
Route::prefix('admin/categories')->middleware('checkrole')->group(function () {
    Route::get('/', 'back\CategoryController@index')->name('admin.categories');
    Route::get('/create', 'back\CategoryController@create')->name('admin.categories.create');
    Route::post('/store', 'back\CategoryController@store')->name('admin.categories.store');
    Route::get('/edit/{category}', 'back\CategoryController@edit')->name('admin.categories.edit');
    Route::post('/update/{category}', 'back\CategoryController@update')->name('admin.categories.update');
    Route::get('/destroy/{category}', 'back\CategoryController@destroy')->name('admin.categories.destroy');
});
Route::prefix('admin/articles')->middleware('checkrole')->group(function () {
    Route::get('/', 'back\ArticleController@index')->name('admin.articles');
    Route::get('/create', 'back\ArticleController@create')->name('admin.articles.create');
    Route::post('/store', 'back\ArticleController@store')->name('admin.articles.store');
    Route::get('/edit/{article}', 'back\ArticleController@edit')->name('admin.articles.edit');
    Route::post('/update/{article}', 'back\ArticleController@update')->name('admin.articles.update');
    Route::get('/destroy/{article}', 'back\ArticleController@destroy')->name('admin.articles.destroy');
    Route::get('/status/{article}', 'back\ArticleController@updatstatus')->name('admin.articles.status');
});


//Route::get('/', function () {
//    return view('front.main');
//})->name('home');

Route::get('/', 'front\HomeController@index')->name('home');

Route::get('/profile{user}', 'UserController@edit')->name('profile')->middleware('auth','verified');
Route::post('/update{user}', 'UserController@update')->name('profileupdate');
Route::get('/article', 'front\ArticleController@index')->name('articles');
Route::get('/article/{article}','front\ArticleController@show')->name('article');
Route::get('/articles/{slug}', 'front\ArticleController@showArticles')->name('articles.by.slug');







Route::prefix('admin/comments')->middleware('checkrole')->group(function () {
    Route::get('/', 'back\CommentController@index')->name('admin.comments');
    Route::get('/edit/{comment}', 'back\CommentController@edit')->name('admin.comments.edit');
    Route::post('/update/{comment}', 'back\CommentController@update')->name('admin.comments.update');
    Route::get('/destroy/{comment}', 'back\CommentController@destroy')->name('admin.comments.destroy');
    Route::get('/status/{comment}', 'back\CommentController@updatstatus')->name('admin.comments.status');

});

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});






