<?php
Route::get('/',['as' => 'upload-form', 'uses' => 'UploadController@uploadForm']);
Route::post('/upload',['as' => 'upload', 'uses' => 'UploadController@upload']);
