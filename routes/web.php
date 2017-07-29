<?php

Route::prefix(config('firefly.web.prefix'))->middleware(config('firefly.web.middleware'))->namespace(config('firefly.web.namespace'))->name('forum.')->group(function () {
    Route::get('/', 'ForumController@index')->name('home');
    Route::get('search', 'ForumController@search')->name('search');

    Route::resource('groups', 'GroupController');
    Route::resource('discussions', 'DiscussionController');
    Route::resource('posts', 'PostController');

    Route::patch('discussions/{discussion}/flags', 'Discussion\FlagController@update')->name('discussions.flag');
});
