<?php

Route::group(['namespace' => 'Ckryo\Laravel\Cms\Controllers', 'prefix' => 'cms'], function ($router) {


    $router->get('index', 'IndexController@index');
    $router->get('news', 'NewsController@index');
    $router->get('notice', 'NoticeController@index');
    $router->get('faq', 'FaqController@index');


    $router->group(['middleware' => 'auth'], function ($router) {
        // 文章发布
        $router->resource('push', 'PushController');

        $router->delete('news', 'NewsController@destory');
        $router->delete('notice', 'NoticeController@destory');
        $router->delete('faq', 'FaqController@destory');
    });
});