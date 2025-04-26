<?php

use Illuminate\Support\Facades\Route;

use App\Models\Staff;
use App\Models\Photo;

Route::get('/', function () {
    return view('welcome');
});


// create a photo associated with staff member
Route::get('/create', function() {

    $staff = Staff::findOrFail(1);

    $staff->photos()->create(['path'=>'example.jpg']);

});


// read staff member's photos
Route::get('/read', function() {

    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo) {
        echo $photo->path;
    }

});


// update photo's paht
Route::get('/update', function() {

    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->whereId(1)->first();
    
    $photo->path = "updated_example.jpg";

    $photo->save();
        
});


// delete photo
Route::get('/delete', function() {

    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->whereId(1)->delete();


});


// assign staff member to a photo
Route::get('/assign', function() {

    $staff = Staff::findOrFail(1);
    $photo = Photo::findOrFail(5);
    
    $staff->photos()->save($photo);

});



Route::get('/unassign', function() {

    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(5)->update(['imageable_id'=>'', 'imageable_type'=>'']);
    // datetime error??

});