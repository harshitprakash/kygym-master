<?php

use App\Http\Controllers\AccessMethodController;
use App\Http\Controllers\Api\RapidApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoorController;

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

Route::middleware('auth:sanctum')->get('/user',
    /**
     * @param Request $request
     * @return mixed
     */
    function (Request $request) {
        return $request->user();
    });

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('get/status', [DoorController::class, 'TargetResponse']);
    Route::post('add/finger/success', [AccessMethodController::class, 'AddFinger']);
    Route::get('add/finger/initiate', [AccessMethodController::class, 'CheckInitiation']);
    Route::post('add/rfid/success', [AccessMethodController::class, 'AddRFID']);
    Route::get('add/rfid/initiate', [AccessMethodController::class, 'CheckInitiationRF']);
});
Route::get('rapid',[RapidApiController::class,'GetBodyPartsList']);
Route::get('rapid/body/{part}',[RapidApiController::class,'GetByBodyParts']);
Route::get('rapid/byId/{id}',[RapidApiController::class,'GetByID']);
Route::get('rapid/all',[RapidApiController::class,'GetAll']);
Route::post('login', [DoorController::class, 'CreateApiToken']);
Route::post('check', function () {
$response = [
"status" => "true",
"message" => "Hello Check"
];
return response($response, '200');
});
