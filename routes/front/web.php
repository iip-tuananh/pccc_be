<?php
Route::group(['namespace' => 'Front'], function () {
    Route::get('/','FrontController@homePage')->name('front.home-page');
    Route::get('/gioi-thieu','FrontController@abouts')->name('front.abouts');
    Route::get('/dich-vu','FrontController@services')->name('front.services');
    Route::get('/dich-vu/{slug}','FrontController@getServiceDetail')->name('front.getServiceDetail');
    Route::get('/du-an','FrontController@projects')->name('front.projects');
    Route::get('/du-an/{slug}','FrontController@getProjectDetail')->name('front.getProjectDetail');
    Route::get('/lien-he','FrontController@contact')->name('front.contact');
    Route::post('/postContact','FrontController@postContact')->name('front.submitContact');


    Route::get('/blogs/{slug?}','FrontController@blogs')->name('front.blogs');
    Route::get('/blog-detail/{slug}','FrontController@blogDetail')->name('front.blogDetail');


});



