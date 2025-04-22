<?php

use Illuminate\Support\Facades\Route;

use App\Models\Post;

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

// Route::get('/update', function() {
    
//     $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);

//     return $updated;

// });

// Route::get('/delete', function() {
//     $deleted = DB::delete('delete from posts where id = ?', [2]);

//     return $deleted;
// });



// ELOQUENT ORM

// Route::get('/read', function() {

//     $posts = Post::all();
 
//     foreach($posts as $post) {
//         return $post->title;
//     }

// });

// automatically finding things on db
// Route::get('/find', function() {

//     // fetch data
//     $post = Post::find(1);
//     return $post->title;

// });

// Route::get('/insert', function() {
//     DB::insert('insert into posts (title, content) values (?,?)', ['Alt Title', 'Alt Content']);
// });

// Route::get('/findwhere', function() {

//     $posts = Post::where('id', 1)->orderBy('id', 'desc')->take(1)->get();

//     return $posts;

// });


// Route::get('/findmore', function() {

//     // $posts = Post::findOrFail(1);

//     // return $posts;

//     $posts = Post::where('users_count', '<', 50)->firstOrFail();


// });


// inserting 
// Route::get('/basicinsert', function() {
//     $post = new Post;

//     $post->title = 'new eloquent (ORM) title';
//     $post->content = 'wow eloquent is really cool';

//     $post->save();

// });

// altering records 
// Route::get('/basicinsert2', function() {

//     $post = Post::find(4);

//     $post->title = 'New eloquent title insert 2';
//     $post->content = 'new eloquent content number 2';

//     $post->save();

// });

// mass assigning
// Route::get('/create', function() {

//     Post::create(['title'=>'the create method', 'content'=>'WOW i\'m learning a lot']);

// });


// updating
// Route::get('/update', function() {

//     Post::where('id', 6)->where('is_admin', 0)->update(['title'=>'NEW PHP TITLE', 'content'=>'I love my instructor']);

// });


// deleting
// Route::get('/delete', function() {

//     $post = Post::find(20);

//     $post->delete();

// });

// Route::get('/delete2', function() {

//     Post::destroy([4, 5]);

// });

// Route::get('/delete3', function() {

//     Post::where('is_admin', 0)->delete();

// });

// Route::get('/softdelete', function() {

//     Post::find(10)->delete();

// });

// Route::get('/readsoftdelete', function() {

//     // doesn't work because it knows it was trashed
//     // $post = Post::find(1);
//     // return $post;

//     // $post = Post::withTrashed()->where('id', 9)->get();
//     // return $post;

//     $post = Post::onlyTrashed()->where('is_admin', 0)->get();
//     return $post;

// });

// restoring deleted items
// Route::get('/restore', function() {

//     Post::withTrashed()->where('is_admin', 0)->restore();

// });


// force delete
Route::get('/forcedelete', function() {

    Post::onlyTrashed()->where('is_admin', 0)->forceDelete();

});