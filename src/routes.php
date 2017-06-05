<?php

Route::group(['namespace' => 'Ckryo\Laravel\Cms\Controllers', 'prefix' => 'cms'], function ($router) {


    $router->get('news', 'NewsController@index');
    $router->get('notice', 'NoticeController@index');
    $router->get('faq', 'FaqeController@index');


    $router->group(['middleware' => 'auth'], function ($router) {
        // 头像上传
        $router->resource('push', 'PushController');

        $router->resource('news', 'NewsController');
        $router->resource('notice', 'NoticeController');
        $router->resource('faq', 'FaqeController');
    });
});