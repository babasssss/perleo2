<?php

use App\Http\Controllers\AimerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\MaCarteController;
use App\Http\Controllers\MonProfilController;
use App\Http\Controllers\ProfileController;
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


// Route::get('/test', function () {
//     return view('test');
// });

// Route::get('/accueil', function () {
//     return view('accueil');
// });

Route::get('/',[DasboardController::class,'index'])->name('accueil');
Route::get('/ma-carte',[MaCarteController::class,'index'])->middleware(['auth', 'verified'])->name('ma-carte');


Route::get('/mon-compte',[MonProfilController::class,'index'])->middleware(['auth', 'verified'])->name('mon-compte');

Route::delete('article/{id}', [MonProfilController::class, 'delete'])->middleware(['auth', 'verified'])->name('mon-compte.delete');
Route::delete('evenementProfil/{id}', [MonProfilController::class, 'deleteEvenement'])->middleware(['auth', 'verified'])->name('mon-compte.deleteEvenement');
Route::delete('dislikeEvenement/{id}', [MonProfilController::class, 'dislikeEvenement'])->middleware(['auth', 'verified'])->name('mon-compte.dislikeEvenement');
Route::delete('dislikeArticle/{id}', [MonProfilController::class, 'dislikeArticle'])->middleware(['auth', 'verified'])->name('mon-compte.dislikeArticle');

Route::get('/like/{id_article}/{id_user}',[AimerController::class,'index'])->middleware(['auth', 'verified'])->name('like');
Route::get('/like_event/{code}/{id_user}',[AimerController::class,'indexEvent'])->middleware(['auth', 'verified'])->name('like_event');

Route::get('/evenement/{nom}',[EvenementController::class,'index'])->middleware(['auth', 'verified'])->name('evenementName');

Route::get('/ajouter-un-article',[ArticleController::class,'index'])->middleware(['auth', 'verified'])->name('ajouter-un-article');
Route::post('/ajouter-un-article',[ArticleController::class,'store'])->middleware(['auth', 'verified'])->name('ajouter-un-article.post');

Route::get('/favoris',[FavorisController::class,'index'])->middleware(['auth', 'verified'])->name('favoris');







Route::get('/dashboard', function () {
    return view('accueil');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
