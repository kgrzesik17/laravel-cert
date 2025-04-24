<?php

use Illuminate\Support\Facades\Route;

Use App\Models\User;
Use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});
    

// add record
Route::get('/create', function() {

    $user = User::findOrFail(1);

    $user->posts()->save(new Post(['title'=>'My first post','body'=>'I love Laravel']));

});


// read all posts belonging to user
Route::get('/read', function() {

    $user = User::findOrFail(1);

    foreach($user->posts as $post) {
        echo $post->title . '<br>';
    }

});


// update record
Route::get('/update', function() {

    $user = User::findOrFail(1);

    // $user->posts()->whereId(1)->update(['title'=>'I love Laravel', 'body'=>'This is awesome']);
    $user->posts()->where('id','=','2')->update(['title'=>'I love Laravel 2', 'body'=>'This is awesome 2']);

});


//delete user relationship
Route::get('/delete', function() {

    $user = User::findOrFail(1);
    $posts = $user->posts();
    
    return $posts->whereId(6)->delete();

});