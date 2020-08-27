<?php

use App\Post;
use App\User;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create/{id}', function($id){

    $user = User::findOrFail($id);

    $post = new Post(['title'=>'Hello World!','body'=>'My first post with Edwin Diaz']);

    $user->posts()->save($post);

});

Route::get('/read/{id}',function($id){

    $user = User::findOrFail($id);

    foreach($user->posts as $post){
        echo $post .'</br>';
    }

    //dd($user);

});

Route::get('/update/{id}', function($id){

    $user = User::find($id);

    $user->posts()->whereId(2)->update(['title'=>'I love laravel', 'body'=>'This is awesome!']);

});


Route::get('/delete/{id}',function($id){

    $user = User::find($id);

    $user->posts()->where('id','=','1')->forceDelete();

});