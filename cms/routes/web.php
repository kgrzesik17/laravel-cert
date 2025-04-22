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

// Route::get('/contact', '\App\Http\Controllers\PostsController@contact');

// Route::get('post/{id}/{name}', '\App\Http\Controllers\PostsController@show_post');

// not needed
// use Illuminate\Support\Facades\DB;

// Route::get('/insert', function() {
//     DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel', 'PHP Laravel is the best thing that has happened to PHP']);
// });

// Route::get('/read', function() {
//     $results = DB::select('select * from posts where id = ?', [1]);

//     return var_dump($results);

//     // foreach($results as $result) {
//     //     return $result->title;
//     // }
// });

Route::get('/update', function() {
    
    $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);

    return $updated;

});

Route::get('/delete', function() {
    $deleted = DB::delete('delete from posts where id = ?', [2]);

    return $deleted;
});