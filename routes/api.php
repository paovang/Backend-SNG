<?php

use App\Http\Controllers\User\UserController;
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


Route::get('get-data', [UserController::class, 'getAllDatas'])->name('get.all');
Route::post('post-data', [UserController::class, 'postData'])->name('post.data');
Route::put('update-data/{id}', [UserController::class, 'updateData'])->name('update.data');
Route::delete('delete-data/{id}', [UserController::class, 'deleteData'])->name('delete.data');
Route::get('get-by-id/{id}', [UserController::class, 'getById'])->name('get.by.id');

