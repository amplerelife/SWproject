<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think/:version', function ($version) {
    return 'hello,ThinkPHP' . $version . '!';
});


Route::rule('api/AddAccount/:id/:password/:type', 'User/create_account');
Route::rule('api/Login/:id/:password', 'User/login');
Route::rule('api/DeleteAccount/:id', 'User/delete_account');