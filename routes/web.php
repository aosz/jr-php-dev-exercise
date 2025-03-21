<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PictureController;


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

Route::get('/', [PictureController::class, 'index']);

Route::resources([
    'pictures' => PictureController::class,
]);

Route::get('/pictures/{picture}/upvote', [PictureController::class, 'upvote'])->name('pictures.upvote');
