<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
//     return "Hi about page";
// });

// Route::get('/contact', function () {
//     return "hi I am contact";
// });

// Route::get('/post/{id}/{name}', function($id, $name) {
//     return "This is post number " . $id . ' ' . $name;
// });

// Route::get('admin/posts/example', array('as'=>'admin.home', function() {
    
//     $url = route('admin.home');

//     return 'this url is ' . $url;

// }));


// Route::get('/post/{id}', '\App\Http\Controllers\PostsController@index');

// Route::resource('posts', 'App\Http\Controllers\PostsController');

Route::get('/contact', '\App\Http\Controllers\PostsController@contact');

Route::get('post/{id}/{name}', '\App\Http\Controllers\PostsController@show_post');