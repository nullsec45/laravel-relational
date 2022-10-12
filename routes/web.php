<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\{BlogController, CommentController, HomeController};

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource("blog",BlogController::class)->except(["index","show"])->middleware("auth");
Route::resource("blog",BlogController::class)->only(["index","show"]);
Route::get("/course", [CourseController::class,"index"]);
Route::get("/course/join/{id}", [CourseController::class,"join"]);
Route::get("/tags", [HomeController::class,"tags"])->middleware("auth");
// Route::get("/course/left/{id}", [CourseController::class,"left"]);

// nested resources
Route::resource("blog.comments", CommentController::class)->shallow();