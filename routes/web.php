<?php

use Illuminate\Support\Facades\Route;
use App\Constants\AppConstants;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auths\LoginController;
use App\Http\Controllers\Auths\PreRegistController;
use App\Http\Controllers\Auths\PreUpdateController;
use App\Http\Controllers\Auths\RegistController;
use App\Http\Controllers\Auths\UpdateController;
use App\Http\Controllers\Managements\TopController;
use App\Http\Controllers\Managements\ListingController;
use App\Http\Controllers\Managements\ContactListController;
use App\Http\Controllers\Managements\ResearchDetailListController;
use App\Http\Controllers\Managements\AccountOutsorcingListController;

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

Route::post(AppConstants::KEY_AUTHS, [LoginController::class, 'login']);
Route::post(AppConstants::ROOT_DIR_AUTHS_PRE_REGIST, [PreRegistController::class, 'preRegist']);
Route::post(AppConstants::ROOT_DIR_AUTHS_PRE_UPDATE, [PreUpdateController::class, 'preUpdate']);

Route::match(['get','post'], AppConstants::ROOT_DIR_AUTHS_REGIST . '/{email_verify_token}', [RegistController::class, 'show']);
Route::match(['get','post'], AppConstants::ROOT_DIR_AUTHS_UPDATE . '/{email_password_reset_token}', [UpdateController::class, 'show']);

/**
 * ログイン前の場合に遷移不可の画面リダイレクトを行う処理
 *
 */
Route::group(['middleware' => 'auth'], function(){
		Route::get(AppConstants::KEY_TOP, [TopController::class, 'show']);
		Route::get(AppConstants::KEY_LISTING, [ListingController::class, 'show']);
		Route::get(AppConstants::KEY_CONTACT_LIST, [ContactListController::class, 'show']);
		Route::get(AppConstants::KEY_RESEARCH_DETAIL_LIST, [ResearchDetailListController::class, 'show']);
		Route::get(AppConstants::KEY_ACCOUNT_OUTSOURCING_LIST, [AccountOutsorcingListController::class, 'show']);
});

/**
 * ログイン後の場合に遷移不可の画面リダイレクトを行う処理
 *
 */
Route::group(['middleware' => 'guest'], function(){
		Route::get('/', [LoginController::class, 'show'])->name('login');
		Route::get(AppConstants::KEY_AUTHS, [LoginController::class, 'show']);
		Route::get(AppConstants::ROOT_DIR_AUTHS_PRE_REGIST, [PreRegistController::class, 'show']);
		Route::get(AppConstants::ROOT_DIR_AUTHS_PRE_UPDATE, [PreUpdateController::class, 'show']);
});
