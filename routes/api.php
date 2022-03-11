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
use Illuminate\Support\Facades\Auth;

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

// });

//route to loginController
Route::post('/login', [LoginController::class, 'authenticate']);

//route masjid controller


//create route test
Route::post('/test', function () {
    return "ok";
});

//group middleware auth:sanctum
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/kajian1', [KajianController::class, 'saveKajian']);

    Route::apiResource('kajian', KajianController::class);

    //propose kajian
    Route::post('/kajian/{id}/propose', [KajianController::class, 'propose']);
    Route::get('/masjidkajian', [MasjidController::class, 'hasKajian']);
    Route::post('/masjidkajian/{id}/accept', [MasjidController::class, 'acceptUstadz']);

    Route::apiResource('masjid', MasjidController::class);

    //ustadzhaskajian
    Route::get('/ustadz/kajian', [UstadzController::class, 'hasKajian']);
    Route::apiResource('ustadz', UstadzController::class);
    // Route::get('/post/{id}', 'PostController@index')->where('id', '[0-9]+');

    Route::apiResource('speciality', SpecialityController::class);
    Route::apiResource('sylabus', SylabusController::class);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $role=Auth::user()->getRoleNames()[0];
    $user=$request->user();

    if ($role=="ustadz") {
        return response()->json(['user'=>$user,'role'=>$user->getRoleNames(),'profile'=>$user->ustadz], 200);
    } elseif ($role=="masjid") {
        return response()->json(['user'=>$user,'role'=>$user->getRoleNames(),'profile'=>$user->masjid], 200);
    }
});

//route group middleware sanctum and role admin
Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
    Route::get('/admin', function () {
        return 'admin';
    });
});
