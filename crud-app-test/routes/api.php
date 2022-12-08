<?php
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteserviceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/agents', [userController::class, 'list'])->name('users-list');
Route::post('/v1/agent', [userController::class, 'add'])->name('user-add');
Route::put('v1/agent/{userId}', [userController::class, 'update'])->name('user-update');
Route::delete('v1/agent/{userId}', [userController::class, 'delete'])->name('user-delete');