<?php

use Illuminate\Support\Facades\Route;

use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;

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
// Route::get('/forcedelete', function() {

//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();

// });


/*
| ELOQUENT RELATIONSHIPS |
*/

// // one to one relationship
// Route::get('/user/{id}/post', function($id) {

//     return User::find($id)->post->content;

// });

// // returns username assigned to posts creator
// Route::get('/post/{id}/user', function($id) {

//     return Post::find($id)->user->name;

// });

// one to many relationship
// Route::get('/posts', function() {

//     $user = User::find(1);

//     foreach($user->posts as $post) {
//         echo $post->title . "<br>";
//     }

// });

// many to many relationship
// Route::get('/user/{id}/role', function($id) {

//     $user = User::find($id)->roles()->orderBy('id', 'desc')->get();

//     return $user;

//     // foreach($user->roles as $role) {
//     //     return $role->name;
//     // }
// });


// accessing the table / pivot

// Route::get('user/pivot', function() {

//    $user = User::find(1);
   
//    foreach($user->roles as $role) {
//     return $role->pivot;
//    }

// });

// Route::get('user/country', function() {

//    $country = Country::find(3);

//    foreach($country->posts as $post) {
//       return $post->title;
//    }

// });


// polymorphic relations


// Route::get('post/{id}/photos', function($id) {

//    $post = Post::find($id);
   
//    foreach($post->photos as $photo) {
//       echo $photo->path . "<br>";
//    }
   
// });


// Route::get('/photo/{id}/post', function($id){

//    $photo = Photo::findOrFail($id);

//    return $photo->imageable;

// });


// Polymorphic Many to Many

Route::get('/post/tag', function() {

   $post = Post::find(1);

   foreach($post->tags as $tag) {
      echo $tag->name;
   }

});


Route::get('/tag/video', function() {

   $tag = Tag::find(1);

   foreach($tag->videos as $video) {
      echo $video->name;
   }

});

Route::get('/tag/post', function() {

   $tag = Tag::find(2);

   foreach($tag->posts as $post) {
      echo $post->title;
   }

});