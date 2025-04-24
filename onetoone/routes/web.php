<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Address;

Route::get('/', function () {
    return view('welcome');
});

// insert data into db
Route::get('/insert', function() {

    $user = User::findOrFail(1);

    $address = new Address(['name'=>'3123 Paulina av NY NY 11218']);

    $user->address()->save($address);

});

// update data in db
Route::get('/update', function() {

    $address = Address::whereUserId(1)->first();
    $address->name = "4253 Update Av, Alaska";

    $address->save();

});


// read data from db
Route::get('/read', function() {

    $user = User::find(1);
    $address = $user->address;

    return $address;

});