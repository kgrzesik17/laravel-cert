<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});


// insert data to the database
Route::get('/adduser', function() {

    // return DB::insert('insert into users (name, email, password) values (?, ?, ?)', ['kacper', 'kacper@gmail.com', 'secret']);

    $user = new User;

    $user->name = 'Kacper2';
    $user->email = 'kacper2@gmail.com';
    $user->password = 'top secret';

    return $user->save();

});

Route::get('/addpost', function() {
    
    return DB::insert('insert into posts (title, content, user_id) values (?, ?, ?)', ['about me', 'sample content', 1]);

});


// get info by id
Route::get('/user/{id}', function($id) {

    $user = User::find($id);
    return $user->name;

});


// show all articles
Route::get('/articles', function() {

    $posts = Post::all();

    foreach($posts as $post) {
        echo $post;
    }

});


// where 
Route::get('/where', function() {

    $posts = Post::where('id', 1);

    return $posts;

});


// RELATIONSHIPS
// one to one
Route::get('/user/{id}/post', function($id) {

    return User::find($id)->post;

});

//one to many
Route::get('/user/{id}/posts', function($id){

    $posts = User::find($id)->posts;

    foreach($posts as $post) {
        echo $post;
        echo '<br>';
    }

});