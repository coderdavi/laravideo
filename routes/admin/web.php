<?php
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    Route::get('/login','EntryController@loginForm');
    Route::post('/login','EntryController@login');
    Route::get('/index','EntryController@index');
    Route::get('/logout','EntryController@logout');
    //修改密码
    Route::get('/changePassword', 'MyController@passwordForm');
    Route::post('/changePassword', 'MyController@changePassword');

    Route::resource('tag','TagController');
    Route::resource('lesson','LessonController');
});
