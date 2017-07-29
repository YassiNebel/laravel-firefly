<?php

Route::prefix(config('firefly.api.prefix'))->middleware(config('firefly.api.middleware'))->namespace(config('firefly.api.namespace'))->name('forum.api.')->group(function () {
    Route::resource('discussions', 'DiscussionController', ['except' => ['create', 'edit']]);
    Route::resource('groups', 'GroupController', ['except' => ['create', 'edit']]);
    Route::resource('posts', 'PostController', ['except' => ['create', 'edit']]);

    Route::patch('discussions/{discussion}/flags', 'Discussion\FlagController@update')->name('discussions.flag');
});
