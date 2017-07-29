<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    |
    | Set your eloquent model for your users.
    |
    */

    'user' => App\User::class,

    /*
    |--------------------------------------------------------------------------
    | Group Mode
    |--------------------------------------------------------------------------
    |
    | Set the group mode to either "nested" or "flat" for a different forum
    | experience.
    |
    */

    'group_mode' => 'nested',

    /*
    |--------------------------------------------------------------------------
    | Discussion Group Limit
    |--------------------------------------------------------------------------
    |
    | Set the maximum number of groups that a discussion can be created in.
    | Only applicable if group_mode is set to 'flat'.
    |
    */

    'discussion_group_limit' => 3,

    /*
    |--------------------------------------------------------------------------
    | Soft Deletes
    |--------------------------------------------------------------------------
    |
    | Set the value to either a true or false boolean to decide whether you'd
    | like to have soft deletes or force deletes respectively.
    |
    */
    'soft_deletes' => true,

    /*
    |--------------------------------------------------------------------------
    | Pagination Limits
    |--------------------------------------------------------------------------
    |
    | Set the maximum number of resources that will be shown per page.
    |
    */

    'pagination' => [
        'discussions' => 20,
        'posts'       => 15,
    ],

    /*
    |--------------------------------------------------------------------------
    | API and Web
    |--------------------------------------------------------------------------
    |
    | Include whichever middleware and namespace(s) you want here.
    |
    */

    'api' => [
        'enabled'    => false,
        'prefix'     => 'api/forum',
        'namespace'  => '\Bitporch\Forum\Controllers\Api',
        'middleware' => ['api', 'auth:api'],
    ],

    'web' => [
        'enabled'    => true,
        'prefix'     => 'forum',
        'namespace'  => '\Bitporch\Forum\Controllers',
        'middleware' => 'web',
    ],

];
