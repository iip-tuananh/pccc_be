<?php
Route::group(['namespace' => 'Front'], function () {
    Route::get('/','FrontController@homePage')->name('front.home-page');
    Route::get('/gioi-thieu','FrontController@abouts')->name('front.abouts');
    Route::get('/ve-chung-toi/{slug}','FrontController@about_page')->name('front.about_page');
    Route::get('/dich-vu/{slug?}','FrontController@services')->name('front.services');
    Route::get('/chi-tiet-dich-vu/{slug}','FrontController@getServiceDetail')->name('front.getServiceDetail');
    Route::get('/kien-thuc/{slug?}','FrontController@knowledge')->name('front.knowledge');
    Route::get('/chi-tiet-bai-viet-kien-thuc/{slug}','FrontController@getKnowledgeDetail')->name('front.getKnowledgeDetail');

    Route::get('/du-an/{slug?}','FrontController@projects')->name('front.projects');
    Route::get('/chi-tiet-du-an/{slug}','FrontController@getProjectDetail')->name('front.getProjectDetail');
    Route::get('/lien-he','FrontController@contact')->name('front.contact');
    Route::post('/postContact','FrontController@postContact')->name('front.submitContact');


    Route::get('/tin-tuc/{slug?}','FrontController@blogs')->name('front.blogs');
    Route::get('/chi-tiet-tin-tuc/{slug}','FrontController@blogDetail')->name('front.blogDetail');


    Route::get('/{any}', function () {
        // Laravel tự load view errors/404.blade.php khi abort(404)
        abort(404);
    })
        ->where('any', '.*');

});




