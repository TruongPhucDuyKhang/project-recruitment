<?php

use Illuminate\Support\Facades\Route;

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

Route::pattern('slug','(.*)');
Route::pattern('id','([0-9]*)');

Route::group(['namespace' => 'Job'], function(){
	Route::get('', 'IndexController@index')->name('job.index.index');
	Route::get('tim-kiem-viec-lam-nhanh', 'IndexController@search')->name('job.index.search');
	//Job List
	Route::get('viec-lam', 'ListController@index')->name('job.list.index');
	Route::post('viec-lam', 'ListController@searchWage')->name('job.list.ajax');
	Route::get('{slug}-{id}.html', 'ListController@detail')->name('job.list.detail');
	//End - Job List
	//Company no Auth
	Route::get('ntd-hang-dau', 'CompanyController@index')->name('job.company.index');
	Route::get('danh-sach-tin-tuyen-dung-{slug}-{id}', 'CompanyController@detail')->name('job.company.detail');
	//End Company no Auth
	//News 
	Route::get('tu-van-bai-viet', 'NewsController@index')->name('job.news.index');
	//End - News
	//Pin 
	Route::get('update-pin', 'PinController@postUpdatepin')->name('update-pin');
	//End - Pin

	Route::group(['middleware' => 'auth'], function(){
		//Nhà tuyển dụng
		Route::group(['middleware' => 'role:1'], function(){
			//Company 
			Route::get('ho-so-cong-ty', 'CompanyController@getAdd')->name('job.company.add');
			Route::post('ho-so-cong-ty', 'CompanyController@postAdd')->name('job.company.add');
			//End - Company

			//Recruitment
			Route::get('danh-sach-tin-tuyen-dung', 'RecruitmentController@index')->name('job.recruitment.index');
			Route::get('dang-tin-tuyen-dung', 'RecruitmentController@getAdd')->name('job.recruitment.add');
			Route::post('dang-tin-tuyen-dung', 'RecruitmentController@postAdd')->name('job.recruitment.add');
			//End - Recruitment

			//Resume
			Route::get('danh-sach-ung-tuyen-dung', 'ResumeController@index')->name('job.resume.index');
			Route::get('resume', 'ResumeController@getResume')->name('job.resume.model');
			Route::get('accept', 'ResumeController@accept')->name('job.resume.accept');
			Route::get('no-accept', 'ResumeController@noAccept')->name('job.resume.no-accept');
			//End - Resume

			//Coins 
			Route::get('nap-xu', 'CoinsController@index')->name('job.coin.vnpay-coin');
			Route::get('vnpay-coin', 'CoinsController@getVnpay')->name('success-vnpay');
			Route::post('vnpay-coin', 'CoinsController@postVnpay')->name('job.coin.vnpay');
			//End - Coins

			//Pin 
			Route::get('pin', 'PinController@postPin')->name('pin');
			//End - Pin
		});	
		// End - Nhà Tuyển Dụng

		//Người Tìm Việc Làm
		Route::group(['middleware' => 'role:0'], function(){
			//Submission info
			Route::get('viec-da-ung-tuyen', 'SubmitinfoController@index')->name('job.submitinfo.index');
			Route::get('viec-da-ung-tuyen?sort={slug}', 'SubmitinfoController@index')->name('job.submitinfo.sort');
			Route::get('nop-ho-so', 'SubmitinfoController@getAdd')->name('job.submitinfo.add');
			Route::post('nop-ho-so', 'SubmitinfoController@postAdd')->name('job.submitinfo.add');
			Route::get('edit-profile', 'SubmitinfoController@getEdit')->name('job.submitinfo.edit-profile');
			Route::post('post-profile', 'SubmitinfoController@postEdit')->name('job.submitinfo.post-profile');
			Route::get('del-viec-da-ung-tuyen', 'SubmitinfoController@delSub')->name('del-sub');
			//End - Submission info
			Route::get('viec-lam-da-luu', 'SaveRecruitment@index')->name('job.savercm.index');
		});
		//End - Người Tìm Việc Làm

		//Trang quản trị
		Route::group(['middleware' => 'role:2'], function(){
			Route::get('admin', 'AdminindexController@index')->name('job.admin.index');
		});
		//End - Trang quản trị
		

		//Profile 
		Route::get('doi-mat-khau', 'ProfileController@getChangePassword')->name('job.profile.changePassword');
		Route::post('doi-mat-khau', 'ProfileController@postChangePassword')->name('job.profile.changePassword');
		//End - Profile
		
		//Save Recruitment
		Route::post('luu-viec-lam', 'SaveRecruitment@saveRecruitment')->name('job.list.ajax-savercm');
		Route::post('huy-luu-viec-lam', 'SaveRecruitment@unRecruitment')->name('un-recruitment');
		//End - Save Recruitment
		
		
		
		Route::get('ho-so-ca-nhan', 'ProfileController@profilePersonal')->name('job.profile.profilePersonal');
		Route::post('ho-so-ca-nhan', 'ProfileController@postProfile')->name('job.profile.profilePersonal');
		Route::get('ho-so-dinh-kem', 'ResumeController@getAdd')->name('job.resume.add');
	});
});

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function(){
// 	//Login
	Route::get('login', 'AuthController@login')->name('auth.auth.login');
	Route::post('login-two', 'AuthController@postLoginTwo')->name('auth.auth.logins');
	Route::post('login', 'AuthController@postLogin')->name('post-login');
// 	//End - Login
// 	//Register
// 	Route::get('register', 'AuthController@register')->name('auth.auth.register');
	Route::post('register', 'AuthController@postRegister')->name('post-register');
// 	//End - Register
// 	//ForgotPassword
// 	Route::get('Forgot-password', 'AuthController@forgotPassword')->name('auth.auth.forgotpassword');
// 	Route::post('Forgot-password', 'AuthController@postForgotPassword')->name('auth.auth.forgotpassword');
// 	//End - ForgotPassword
	
// 	Route::get('code-validate', 'AuthController@codeValidate')->name('auth.auth.codevalidate');
// 	Route::post('code-validate', 'AuthController@postCodevalidate')->name('auth.auth.codevalidate');
// 	Route::get('change-password', 'AuthController@changePassword')->name('auth.auth.changepassword');
// 	Route::post('change-password', 'AuthController@postChangepassword')->name('auth.auth.changepassword');
	
	Route::get('logout', 'AuthController@logout')->name('logout');
});

Route::get('/pass', function(){
	return bcrypt('123123');
});