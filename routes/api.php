<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('contacts',[ ContactController::class, 'contacts']);

Route::get('get_contact/{id}',[ ContactController::class, 'getContact']);

Route::post('save_contact',[ ContactController::class, 'saveContact']);

Route::post('update_contact/{id}',[ ContactController::class, 'updateContact']);

Route::delete('delete_contact/{id}',[ ContactController::class, 'deleteContact']);

