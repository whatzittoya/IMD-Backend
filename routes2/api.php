<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//import masjidcontroller
use App\Http\Controllers\API\MasjidController;
use App\Http\Controllers\API\UstadzController;
use App\Http\Controllers\API\KajianController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\SpecialityController;
use App\Http\Controllers\API\SylabusController;

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

//route to loginController
Route::post('/login', [LoginController::class, 'authenticate']);

//route masjid controller


//create route test
Route::post('/test', function () {
    return "ok";
});

//group middleware auth:sanctum
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('kajian', KajianController::class);
    Route::apiResource('masjid', MasjidController::class);
    Route::apiResource('ustadz', UstadzController::class);

    Route::apiResource('speciality', SpecialityController::class);
    Route::apiResource('sylabus', SylabusController::class);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user=$request->user();
    return response()->json(['user'=>$user,'role'=>$user->getRoleNames()], 200);
});

//route group middleware sanctum and role admin
Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
    Route::get('/admin', function () {
        return 'admin';
    });
});
