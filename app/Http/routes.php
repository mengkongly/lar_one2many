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

/* Route::get('/user/{id}/posts',function($id){

    //return User::findOrFail($id)->posts;
    $user   =    User::findOrFail($id);
    return $user->posts;
}); */

Route::get('/user/{id}/posts','PostController@index');
//Route::post('/user/{id}/post','PostController@store');
Route::get('/user/{id}/in_post',function($id){
    $user   =   User::findOrFail($id);

    $post      =    new Post(["title"=>"New title 2","body"=>"Content of new title 2"]);
    /* $post->title="New title";
    $post->body="Content of new title"; */

    $user->posts()->save($post);
});

//get by user id and post id
Route::get('/user/{id}/post/{post_id}',function($id,$post_id){

    $user   =   User::where('id',$id)->first();
    return $user->posts()->where('id',$post_id)->get();
});

//get update by user id and post id
Route::get('/user/{id}/up_post/{post_id}',function($id,$post_id){

    $user   =   User::findOrFail($id);
    return $user->posts()->whereId($post_id)->update(['title'=>'Update title','body'=>'Update body title']);
});

Route::get('/user/{id}/del_post/{post_id}',function($id,$post_id){
    $user   =   User::findOrFail($id);
    return $user->posts()->whereId($post_id)->delete();
});


