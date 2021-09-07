<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\FEAdmin\ChartController;
use App\HTTP\Controllers\FEAdmin\ClientReviewController;
use App\HTTP\Controllers\FEAdmin\ContactController;
use App\HTTP\Controllers\FEAdmin\CourseController;
use App\HTTP\Controllers\FEAdmin\FooterController;
use App\HTTP\Controllers\FEAdmin\InformationController;
use App\HTTP\Controllers\FEAdmin\ServiceController;
use App\HTTP\Controllers\FEAdmin\ProjectController;
use App\HTTP\Controllers\FEAdmin\HomePageController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Chart Route
Route::get('/chartdata',[ChartController::class, 'allSelect']);

//Client Review Route
Route::get('/clientreview',[ClientReviewController::class, 'allSelect']);

//Contact Info send Review Route
Route::post('/contactsend',[ContactController::class, 'contactSend']);

//Course Info send Review Route
Route::get('/coursehome',[CourseController::class, 'fourSelect']);
Route::get('/courseall',[CourseController::class, 'allSelect']);
Route::get('/coursedetail/{courseID}',[CourseController::class, 'detailSelect']);

//Footer Review Route
Route::get('/footerdata',[FooterController::class, 'allSelect']);

//Information Route
Route::get('/information',[InformationController::class, 'allSelect']);

//Services Route
Route::get('/service',[ServiceController::class, 'allSelect']);

//Services Route
Route::get('/projecthome',[ProjectController::class, 'threeSelect']);
Route::get('/projectall',[ProjectController::class, 'allSelect']);
Route::get('/projectdetail/{projectID}',[ProjectController::class, 'detailSelect']);

//Home Page Route
Route::get('/home/video',[HomePageController::class, 'videoSelect']);
Route::get('/totalhome',[HomePageController::class, 'totalHomeSelect']);
Route::get('/techhome',[HomePageController::class, 'techHomeSelect']);
Route::get('/hometitle',[HomePageController::class, 'homeTitleSelect']);