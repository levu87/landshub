<?php

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


Route::get('/', ('HomeControler@index'));
// route
Route::get('/tin-tuc',function(){
    return view('site.tin-tuc');
});
Route::get('/ky-goi',function(){
    return view('site.ky-goi');
});
Route::get('/lien-he',function(){
    return view('site.lien-he');
});
Route::get('/thue', 'AdsController@thueindex');
Route::get('/ban', 'AdsController@banindex');
Route::get('/chi-tiet/{id}','AdsController@singleban' )->name('chi-tiet');
Route::get('/chi-tiet/{id}','AdsController@singlethue' )->name('chi-tiet');
Route::get('/muc-du-an','DuAnController@mucduan' );
Route::get('/du-an/chi-tiet/{id}','duanController@single' )->name('du-an-chi-tiet');
Route::post('/tim-kiem', 'HomeControler@search')->name('search');
// for user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/tai-khoan', 'UserController@taikhoan');
    Route::get('/doi-mat-khau', 'UserController@doimatkhau')->name('doi-mat-khau');
    Route::post('/doi-mat-khau','UserController@changePassword')->name('doi-mat-khau');
    // tin bán
    Route::get('/quan-ly-tin','AdsController@quanlytin')->name('quan-ly-tin');
    Route::get('/tao-tin-ban','AdsController@taotinbanb1');
    Route::post('/tao-tin-ban','AdsController@luutinbanb1')->name('tao-tin-ban');
    Route::get('/tao-tin-ban-b2','AdsController@taotinbanb2');
    Route::post('/tao-tin-ban-b2','AdsController@luutinbanb2')->name('tao-tin-ban-b2');
    Route::get('/sua-tin-ban-b1/{id}','AdsController@suatinbanb1')->name('sua-tin-ban-b1');
    Route::post('/luu-sua-tin-ban-b1','AdsController@luusuatinbanb1')->name('luu-sua-tin-ban-b1');
    Route::get('/sua-tin-ban-b2/{id}','AdsController@suatinbanb2')->name('sua-tin-ban-b2');
    Route::post('/luu-sua-tin-ban-b2','AdsController@luusuatinbanb2')->name('luu-sua-tin-ban-b2');
    Route::post('/xoa-tin', 'AdsController@destroy')->name('xoa-tin');
    Route::post('/tao-don-hang', 'ThanhtoanController@tao')->name('tao-don-hang');
    Route::get('/thanh-cong', 'ThanhtoanController@ok')->name('thanh-cong');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin', 'AdminController@index')->name('admin');
    // dự án
    Route::resource('admin/du-an', 'DuAnController');
    Route::get('admin/tao-du-an-b1', 'DuAnController@taoduanb1');
    Route::post('admin/luu-du-an-b1', 'DuAnController@luuduanb1')->name('luu-du-an-b1');
    Route::get('admin/tao-du-an-b2', 'DuAnController@taoduanb2')->name('tao-du-an-b2');
    Route::post('admin/luu-du-an-b2', 'DuAnController@luuduanb2')->name('luu-du-an-b2');
    Route::get('admin/sua-du-an-b1/{id}', 'DuAnController@suaduanb1');
    Route::post('admin/luu-sua-du-an-b1', 'DuAnController@luusuaduanb1')->name('luu-sua-du-an-b1');
    Route::get('admin/sua-du-an-b2/{id}', 'DuAnController@suaduanb2')->name('sua-du-an-b2');
    Route::post('admin/luu-sua-du-an-b2', 'DuAnController@luusuaduanb2')->name('luu-sua-du-an-b2');
    // quản lý thuê bán
    Route::get('/admin/bai-dang', "AdsController@adminquanly")->name('ad-bai-dang');
    Route::get('/duyet/{id}', "AdsController@adminduyet")->name('ad-duyet');
    Route::post('/xoa-tin-ad', 'AdsController@destroyad')->name('xoa-tin-ad');
    // Thành viên
    Route::resource('admin/thanh-vien', 'UserController');
});
// ajax
Route::post('upload-du-an-images', 'DuAnController@uploadImages');
Route::post('delete-du-an-images', 'DuAnController@deleteImages')->name('delete-du-an-images');
Route::post('upload-ads-images', 'AdsController@uploadImages');
Route::post('delete-ads-images', 'AdsController@deleteImages')->name('delete-ads-images');
// Authentication Routes...
$this->get('/dang-nhap', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/dang-nhap', 'Auth\LoginController@login');
$this->get('/dang-xuat', 'Auth\LoginController@logout')->name('logout');
Route::post('user/update', 'UserController@capnhat')->name('userupdate');
// Registration Routes...
$this->get('/dang-ky', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('/dang-ky', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('/quen-mat-khau', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('/quen-mat-khau/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('/quen-mat-khau/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('/quen-mat-khau', 'Auth\ResetPasswordController@reset');