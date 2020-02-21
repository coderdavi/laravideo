<?php
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    Route::get('/login','EntryController@loginForm');
    Route::post('/login','EntryController@login');
    Route::get('/index','EntryController@index');
});
