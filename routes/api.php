<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OvertimeController;

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

Route::patch('settings', [SettingController::class , 'update_setting'])->name('setting.update');
Route::get('employees', [EmployeeController::class , 'show'])->name('employee.index');
Route::post('employees', [EmployeeController::class ,'store'])->name('employee.store');
Route::get('overtimes', [OvertimeController::class ,'show'])->name('overtime.show');
Route::post('overtimes', [OvertimeController::class ,'store'])->name('overtime.store');
Route::get('overtime-pays/calculate', [OvertimeController::class ,'pay'])->name('overtime.pay');
