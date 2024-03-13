<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerFeedbackController;
use Illuminate\Http\Request;

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
Route::get('/feedback', [CustomerFeedbackController::class, 'showForm']);
Route::post('/feedback', [CustomerFeedbackController::class, 'submitForm']);
Route::get('/feedback/receive', [CustomerFeedbackController::class, 'receiveFeedback']);
Route::get('/feedback/responses', [CustomerFeedbackController::class, 'showFeedbackResponses']);