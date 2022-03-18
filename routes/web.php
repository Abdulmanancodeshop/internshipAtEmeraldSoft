<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/com', function () {
//     return ('<center/><h1/>Hello World</h1></center>');
// });
// Route::get('/about',function() {
//     return view('pages.about');
// });
// ------------dynamically---------------
// Route::get('/user/{id}',function($id) {
//     return 'This is '. $id;
// });
//Route::get('/', 'PagesController@index');
Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);
Route::resource('posts',PostsController::class); //it connected all our route tp those functions that we created in class

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
