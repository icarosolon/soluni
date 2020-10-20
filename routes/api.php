<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DocumentController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/articles', function(){
//     return 'teste';
// });

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{id}', [ArticleController::class, 'show']);
Route::get('/articles/{id}/documents', [ArticleController::class, 'documents']);
Route::get('/articles/search/{termo}', [ArticleController::class, 'search']);

//Route::get('/articles/{id_article}/documents/{id_document}', [DocumentController::class, 'show']);

//Documents
Route::get('/documents', [DocumentController::class, 'index']);
Route::get('/documents/{id}', [DocumentController::class, 'show']);
Route::get('/documents/{id}/download', [DocumentController::class, 'download']);


Route::post('/document', [DocumentController::class, 'store' ]);
