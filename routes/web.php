<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', 'Backend\LoginController@logout')->name('logout');
Route::post('/update/{id}', 'Backend\CustomersController@update')->name('customer_update');
Route::get('/destroy/{id}', 'Backend\CustomersController@destroy')->name('customer_destroy');
Route::get('/edit/{id}', 'Backend\CustomersController@edit')->name('customer_edit');


Route::prefix('admin')->group(function () {
    Route::get('/', 'Backend\DefaultController@index')->name('admin.Index');
    Route::post('/login', 'Backend\DefaultController@authenticate')->name('admin_Authenticate');
    Route::post('/customer/create', 'Backend\CustomersController@create')->name('customer_create');
    Route::post('/email/create/post', 'Backend\CustomersEmailController@store')->name('email_post');
    Route::get('/login', 'Backend\DefaultController@login')->name('admin_Login')->middleware([\App\Http\Middleware\CheckLogin::class]);
    Route::get('/customer', 'Backend\CustomersController@index')->name('customer_Index');
    Route::get('/customer/add', 'Backend\CustomersController@add')->name('customer_add');
    Route::get('/email', 'Backend\CustomersEmailcontroller@index')->name('email_Index');
    Route::get('/email/create', 'Backend\CustomersEmailcontroller@create')->name('email_create');
    Route::get('/masraf', 'Backend\CostController@index')->name('cos_index');
});


Route::get('/email/destroy/{id}', 'Backend\CustomersEmailcontroller@destroy')->name('email_destroy');
Route::post('email/update/post/{id}', 'Backend\CustomersEmailcontroller@update')->name('email_update');
Route::get('/email/edit/{id}', 'Backend\CustomersEmailcontroller@edit')->name('email_edit');


Route::prefix('offer')->group(function () {
    Route::get('/status/{id}', 'Backend\TeklifController@status')->name('offer_status');
    Route::post('/import', 'Backend\TeklifController@import')->name('offer_import');
    Route::get('/edit/{id}', 'Backend\TeklifController@edit')->name('offer_edit');
    Route::post('/update', 'Backend\TeklifController@update')->name('offer_update');
    Route::post('/status/up/{id}', 'Backend\TeklifController@up')->name('status_up');
});


Route::prefix('offers')->group(function () {
    Route::get('', 'Backend\TeklifController@index')->name('offer_index');
    Route::get('/create', 'Backend\TeklifController@create')->name('offer_create');
    Route::get('/create1', 'Backend\TeklifController@newcreate')->name('offer_new_create');
    Route::post('/query', 'Backend\TeklifController@jquery')->name('offer_jquery');
    Route::get('/delete/{id}', 'Backend\TeklifController@delete')->name('offer_delete');
    Route::get('/file/{id}', 'Backend\TeklifController@file')->name('offer_file');
});


Route::get('/create_tesvik/{id}', 'Backend\TeklifController@offersIndex')->name('tesvik_create');
Route::get('/create_kvkk/{id}', 'Backend\TeklifController@offersIndex')->name('kvkk_create');
Route::get('/create_bordroloma/{id}', 'Backend\TeklifController@offersIndex')->name('bordrolama_create');
Route::get('/create_ikmetrik{id}', 'Backend\TeklifController@offersIndex')->name('ikmetrik_create');
Route::get('/create_performans{id}', 'Backend\TeklifController@offersIndex')->name('performans_create');
Route::get('/create_danismanlik{id}', 'Backend\TeklifController@offersIndex')->name('danismanlik_create');
Route::get('/create_egitim{id}', 'Backend\TeklifController@offersIndex')->name('egitim_create');
Route::get('/create_iys{id}', 'Backend\TeklifController@offersIndex')->name('iys_create');
Route::get('/create_mesem{id}', 'Backend\TeklifController@offersIndex')->name('mesem_create');
Route::get('/create_ebordro{id}', 'Backend\TeklifController@offersIndex')->name('ebordro_create');
Route::get('/create_dtesvik{id}', 'Backend\TeklifController@offersIndex')->name('dtesvik_create');
Route::get('/create_dkvkk{id}', 'Backend\TeklifController@offersIndex')->name('dkvkk_create');
Route::post('/offers/delete/{id}', 'Backend\TeklifController@offer_detail_delete')->name('detail_offer_delete');


Route::post('/word_tesvik', 'Backend\DocumentController@tesvik_word_data')->name('tesvik_post');
Route::post('/word_kvkk', 'Backend\DocumentController@kvkk_word_data')->name('kvkk_post');
Route::post('/word_bordroloma', 'Backend\DocumentController@bordrolama_word_data')->name('bordrolama_post');
Route::post('/word_ikmetrik', 'Backend\DocumentController@ikmetrik_word_data')->name('ikmetrik_post');
Route::post('/word_performans', 'Backend\DocumentController@performans_word_data')->name('performans_post');
Route::post('/word_danismanlik', 'Backend\DocumentController@danismanlik_word_data')->name('danismanlik_post');
Route::post('/word_egitim', 'Backend\DocumentController@egitim_word_data')->name('egitim_post');
Route::post('/word_iys', 'Backend\DocumentController@iys_word_data')->name('iys_post');
Route::post('/word_mesem', 'Backend\DocumentController@mesem_word_data')->name('mesem_post');
Route::post('/word_ebordro', 'Backend\DocumentController@ebordro_word_data')->name('ebordro_post');
Route::post('/word_dtesvik', 'Backend\DocumentController@dtesvik_word_tesvik')->name('dtesvik_post');
Route::post('/word_dkvkk', 'Backend\DocumentController@dkvkk_word_data')->name('dkvkk_post');


Route::get('mailchimp', 'MailChimpController@index');
Route::post('mailchimpDelete', 'MailChimpController@mailchimpDelete')->name('mailchimpDelete');


Route::get('/test', 'TestController@test')->name('test');


Route::get('pdf_index', 'Backend\DocumentController@pdf')->name('pdf_index');
Route::get('/document/convert_word_to_pdf', 'Backend\DocumentController@convert')->name('document_wordtopdf');


//Route::get('/create/tesvik','Backend\TeklifController@offersIndex')->name('load_tesvik');
//Route::get('contract/upload/{id}','Backend\TeklifController@contract_upload')->name('contract_upload');
