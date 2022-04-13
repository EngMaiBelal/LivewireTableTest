<?php

use App\Http\Livewire\Posts;
use App\Http\Livewire\EditPost;
use App\Http\Livewire\ShowMessage;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('crud-livewire',  function () {
    return view('crud-livewire');
});

Route::get('parent', function () {
    return view('parent');
});
Route::get('test', function(){
    return view('test');
});
Route::get('dropdown', function(){
    return view('dropdown');
});