<?php

Route::group(['namespace' => 'Ckryo\Laravel\Cms\Controllers', 'prefix' => 'cms'], function ($router) {

    $router->group(['middleware' => 'auth'], function ($router) {
        // 头像上传
        $router->resource('push', 'AvatarController');
    });
});