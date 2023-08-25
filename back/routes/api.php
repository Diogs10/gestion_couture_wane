<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleVenteController;
use App\Http\Controllers\CategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/all", [ArticleController::class, "allCategorieAndFournisseur"]);


Route::apiResource('/categorie',CategorieController::class)->only(['index']);


Route::apiResource('/article',ArticleController::class)->only(['store','update','destroy','index']);


Route::apiResource('/articleVente',ArticleVenteController::class)->only(['store']);
