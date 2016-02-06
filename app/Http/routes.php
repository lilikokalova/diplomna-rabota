<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

// Authentication routes...


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {

    Route::get('auth/facebook', 'Auth\AuthController@facebook_redirectToProvider');
    Route::get('auth/facebook/callback', 'Auth\AuthController@facebook_handleProviderCallback');
    Route::get('auth/twitter', 'Auth\AuthController@twitter_redirectToProvider');
    Route::get('auth/twitter/callback', 'Auth\AuthController@twitter_handleProviderCallback');

    Route::get('imageUploadForm', 'ImageController@upload' );
    Route::post('imageUploadForm', 'ImageController@store' );
    Route::get('/profile', 'ProfileController@index');
    Route::get('/tesseract', 'TesseractController@index');

    Route::auth();
        Route::get("/", function() {
        return redirect("home");

    });

    Route::get('/home', 'HomeController@index');



   /* public function redirectToProvider()
    {
        return Socialize::with('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialize::with('facebook')->user();

        // $user->token;
    }*/
});
