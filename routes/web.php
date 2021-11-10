<?php

use Illuminate\Support\Facades\Route;
//Frontend Routes
Route::get('/', 'PortfolioController@index')->name('/');

//Admin Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//About Routes
Route::get('About-add-info','Admin\AboutController@addAbout')->name('about.add');
Route::post('About-create-info','Admin\AboutController@createAbout')->name('about.create');
Route::get('About-manage-info','Admin\AboutController@manageAbout')->name('about.manage');
Route::get('About-edit-info/{id}','Admin\AboutController@editAbout')->name('about.edit');
Route::post('About-update-info','Admin\AboutController@updateAbout')->name('about.update');
Route::post('About-delete-info/{id}','Admin\AboutController@deleteAbout')->name('about.delete');


//Contact Routes
Route::post('/send-contact-info','Admin\ContactController@sendContact')->name('contact.send');
Route::get('/view-contact-info','Admin\ContactController@viewContact')->name('contact.view');
Route::post('/delete-contact-info/{id}','Admin\ContactController@deleteContact')->name('contact.delete');
Route::get('/view-contact-details/{id}','Admin\ContactController@viewContactDetails')->name('contact.details');
