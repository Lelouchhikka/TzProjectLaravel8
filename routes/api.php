<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::resource('authors', \App\Http\Controllers\AuthorController::class);
Route::resource('posts', \App\Http\Controllers\PostController::class);
Route::resource('categories', \App\Http\Controllers\CatalogController::class);
//● выдача всех новостей конкретного автора
//● выдача списка всех новостей, которые относятся к указанной рубрике
//● выдача списка авторов
//● выдача информации о статьях по их идентификаторам3:53 20.10.2022
//● искать новости по рубрике, включая дочерние
//● поиск новости по названию
//● Добавить новости
//● Добавить Рубрику
//● Добавить Автора
//*При ошибках в валидации возвращать json.
//*Использовать пагинацию где посчитаете что необходимо.
//Ниже Руты для этих задач
Route::get('/getPostsbyAuthor/{id}', [\App\Http\Controllers\HomeController::class,'getPostsbyAuthor']);
Route::get('/getPostsbyCatalog/{id}', [\App\Http\Controllers\HomeController::class,'getPostsbyCatalog']);
Route::get('/getAllAuthors', [\App\Http\Controllers\HomeController::class,'getAllAuthors']);
Route::get('/getInfoPostById/{id}', [\App\Http\Controllers\HomeController::class,'getInfoPostById']);
Route::get('/getPostByCatalogId/{id}',[\App\Http\Controllers\HomeController::class,'getPostByCatalogId']);
Route::get('/getPostByName/{name}',[\App\Http\Controllers\HomeController::class,'getPostByName']);
Route::post('/createPost',[\App\Http\Controllers\PostController::class,'store']);
Route::post('/createAuthor',[\App\Http\Controllers\AuthorController::class,'store']);
Route::post('/createCatalog',[\App\Http\Controllers\CatalogController::class,'store']);
