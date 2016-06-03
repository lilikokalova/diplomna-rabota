<?php

Route::group(['middleware' => 'web'], function () {

   Route::get('/home', 'HomeController@index');

    Route::get('auth/facebook', 'Auth\AuthController@facebook_redirectToProvider');
    Route::get('auth/facebook/callback', 'Auth\AuthController@facebook_handleProviderCallback');
    Route::get('auth/twitter', 'Auth\AuthController@twitter_redirectToProvider');
    Route::get('auth/twitter/callback', 'Auth\AuthController@twitter_handleProviderCallback');

    Route::get('imageUploadForm', 'ImageController@upload' );
    Route::post('imageUploadForm', 'ImageController@store' );
    Route::get('showLists', 'ImageController@show' );

    Route::get('/profile', 'ProfileController@index');

    Route::get('/tesseract', 'ImageController@tesseract');

    Route::get('/translate/bg', 'ImageController@bulgarian');
    Route::get('/translate/ru', 'ImageController@russian');
    Route::get('/translate/fr', 'ImageController@french');
    Route::get('/translate/de', 'ImageController@german');
    Route::get('/translate/es', 'ImageController@spanish');

    Route::get('/editprofile', 'EditProfileController@index');
    Route::post('editprofile/update',['as' => 'addentry', 'uses' => 'EditProfileController@update']);

    Route::auth();
        Route::get("/", function() {
        return redirect("home");

    });

});
