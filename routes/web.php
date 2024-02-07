<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController; // ファイル内で使えるようにする
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('tests/test', [TestController::class, 'index']);
Route::get('shops', [ShopController::class, 'index']);

//Route::resource('contacts', ContactFormController::class);
//Route::resource('contacts', [ContactFormController::class, 'index']);
//->nameで名前をつけてあげるとルート情報に名前をつけてあげることができる。
//view側でリンクを貼ることができる。便利。
//Route::get('contacts', [ ContactFormController::class, 'index'])->name('contacts.index');


//formタグで使う場合は、getかpostしか使えない。
//put, patch, deleteなどは使えないので注意。Ajaxを使ったらいけるらしい
Route::prefix('contacts')
    ->middleware(['auth'])
    ->controller(contactFormController::class)
    ->name('contacts.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}', 'update')->name('update');
        Route::post('/{id}/destroy', 'destroy')->name('destroy');
    });

Route::get('/', function () {
    return view('welcome');
});

//Route::get('tests/test', [TestController::class, 'index']); // 配列で書く

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
