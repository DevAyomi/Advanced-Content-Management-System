<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\category_controller;


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

//Category Route
Route::get('category/all', [category_controller::class, 'allCat'])->name('AllCategory');

Route::post('category/add', [category_controller::class, 'addCat'])->name('store.category');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

	//ELoqouent ORM model
	/*$users = User::all();*/

	//query builder
	$users = DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');

