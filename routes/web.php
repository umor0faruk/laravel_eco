<?php
use App\Http\Controllers\Backend\CardController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SliderController;

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
Route::group(['prefix'=>'/slider'],function(){
    Route::get('/add',[SliderController::class,'add'])->name('slider.add');
    Route::post('/store',[SliderController::class,'store'])->name('slider.store');
    Route::get('/show',[SliderController::class,'show'])->name('slider.show');
    Route::get('/delete/{id}',[SliderController::class,'delete'])->name('slider.delete');
    Route::get('/deleteimage/{id}',[SliderController::class,'deleteimage'])->name('slider.deleteimage');
    Route::get('/multi',[SliderController::class,'multi'])->name('slider.multi');
    Route::post('/multistore',[SliderController::class,'multistore'])->name('slider.multistore');
    Route::get('/view/{id}',[SliderController::class,'view'])->name('slider.view');
    Route::get('/edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
});
Route::group(['prefix'=>'/card'],function(){
    Route::get('/add',[CardController::class,'add'])->name('card.add');
    
});
Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
