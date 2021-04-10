<?php

use Illuminate\Support\Facades\Route;
use App\Constants\AppConstants;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auths\LoginController;
use App\Http\Controllers\Auths\PreRegistController;
use App\Http\Controllers\Auths\PreUpdateController;
use App\Http\Controllers\Auths\RegistController;
use App\Http\Controllers\Auths\UpdateController;
use App\Http\Controllers\Studys\StudyListController;
use App\Http\Controllers\Studys\DetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(AppConstants::ROOT_DIR_AUTHS_LOGOUT, [LoginController::class, 'logout']);

Route::post(AppConstants::ROOT_DIR_AUTHS, [LoginController::class, 'login']);
Route::post(AppConstants::ROOT_DIR_AUTHS_PRE_REGIST, [PreRegistController::class, 'preRegist']);
Route::post(AppConstants::ROOT_DIR_AUTHS_PRE_UPDATE, [PreUpdateController::class, 'preUpdate']);

Route::match(['get','post'], AppConstants::ROOT_DIR_AUTHS_REGIST . '/{email_verify_token}', [RegistController::class, 'show']);
Route::match(['get','post'], AppConstants::ROOT_DIR_AUTHS_UPDATE . '/{email_password_reset_token}', [UpdateController::class, 'show']);

/**
 * ログイン前の場合に遷移不可の画面リダイレクトを行う処理
 *
 */
Route::group(['middleware' => 'auth'], function(){
		Route::get(AppConstants::ROOT_DIR_STUDYS_LIST, [StudyListController::class, 'show']);
		Route::get(AppConstants::ROOT_DIR_STUDYS_DETAIL . '/{contents_id}', [DetailController::class, 'show']);
});

/**
 * ログイン後の場合に遷移不可の画面リダイレクトを行う処理
 *
 */
Route::group(['middleware' => 'guest'], function(){
		Route::get('/', [LoginController::class, 'show'])->name('login');
		Route::get(AppConstants::ROOT_DIR_AUTHS, [LoginController::class, 'show']);
		Route::get(AppConstants::ROOT_DIR_AUTHS_PRE_REGIST, [PreRegistController::class, 'show']);
		Route::get(AppConstants::ROOT_DIR_AUTHS_PRE_UPDATE, [PreUpdateController::class, 'show']);
});
