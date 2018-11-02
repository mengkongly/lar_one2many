<?php
use App\User;
use App\Model\Post;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{id}/posts',function($id){

    //return User::findOrFail($id)->posts;
    $user   =    User::findOrFail($id);
    return $user->posts;
});
