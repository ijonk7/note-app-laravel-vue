<?php

use App\Http\Controllers\Notes\NoteController;
use App\Http\Controllers\Notes\SubjectController;
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

Route::prefix('notes')->group(function()
    {
        Route::get('', [NoteController::class, 'index']);
        Route::post('create-new-note', [NoteController::class, 'store']);
        Route::get('{note:slug}', [NoteController::class, 'show'])->name('notes.show');
        Route::put('{note:slug}/edit', [NoteController::class, 'update']);
        Route::delete('{note:slug}/delete', [NoteController::class, 'destroy']);
    }
);

Route::prefix('subjects')->group(function()
    {
        Route::get('', [SubjectController::class, 'index']);
    }
);

