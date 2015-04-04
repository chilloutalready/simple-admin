<?php

$prefix = SApackageConfig('prefix');



Route::group(['prefix' => $prefix], function()
{
    // Auth first
    Route::controllers([
        '/auth' => 'Chilloutalready\SimpleAdmin\Http\Controllers\Auth\AdminAuthController',
//    $prefix . '/password' => 'Chilloutalready\SimpleAdmin\Http\Controllers\Auth\PasswordController',
    ]);
    Route::get( '{modelName}', 'Chilloutalready\SimpleAdmin\Http\Controllers\BaseAdminController@index');
    Route::get('{modelName}/create', 'Chilloutalready\SimpleAdmin\Http\Controllers\BaseAdminController@create');
    Route::get('{modelName}/edit/{id}', 'Chilloutalready\SimpleAdmin\Http\Controllers\BaseAdminController@edit');
    Route::put('{modelName}/{id}', 'Chilloutalready\SimpleAdmin\Http\Controllers\BaseAdminController@update');
    Route::post('{modelName}', 'Chilloutalready\SimpleAdmin\Http\Controllers\BaseAdminController@store');
    Route::get('{modelName}/delete/{id}', 'Chilloutalready\SimpleAdmin\Http\Controllers\BaseAdminController@delete');

});