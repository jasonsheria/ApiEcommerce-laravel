<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Authentificate;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProduitController;
use App\Http\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group( function () {
    // ajouter produit au panier
    Route::post('/store', [TaskController::class,'store']);
    Route::patch('/panier', [TaskController::class,'index']);
    Route::get('/panier/{id}', [TaskController::class,'show']);
    Route::post('/destroy', [TaskController::class,'destroy']);
    Route::post('/logout',[Authentificate::class,'logout']);
    //recuperer tous les produits du panier
    // supprimer tous les produits du panier
});

Route::post('login', [Authentificate::class, 'login']);
Route::post('register', [Authentificate::class, 'register']);

// recuperer tous les produits
Route::get('/index',[ProduitController::class,'index']);
Route::patch('/search',[ProduitController::class,'search']);
// image supplementaire lors dans le single page

// recuperer les autres informations sur un produit specifique
Route::get('/index/others/{id}',[OtherImageController::class,'index']);
