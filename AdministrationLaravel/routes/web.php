<?php

use App\Http\Controllers\QuizController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/management', function () {
    return view('dashboardManagement');
})->name('dashboardManagement');


//ok
Route::post('/managementRecup', [QuizController::class, 'GetCsv'])->name('quiz.store');

//ok 
Route::post('/storeToDatabase', [QuizController::class, 'storeData'])->name('data.store');

//ok
Route::get('/parse', [QuizController::class, 'showParsedCsv'])->name('parse.csv');