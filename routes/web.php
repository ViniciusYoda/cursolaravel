<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::any('/any', function() {
//     return "Perminte todo tipo de acesso http";
// });

// Route:match(['get', 'post'], '/match', function() {
//     return "Perminte apenas acessos definidos";
// });

Route::get('/produto/{id}/{cat?}', function($id, $cat = "") {
    return "O id do produto é:".$id."<br>"."A categoria do produto é:".$cat;
});

Route::redirect('/sobre', '/empresa');

Route::view('/empresa', 'site/empresa');

Route::get('/timesnownews', function() {
    return view('news');
})->name('noticias');

Route::get('/novidades', function() {
    return redirect()->route('noticias');
});