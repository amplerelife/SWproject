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

Route::rule('api/form/Check', 'IRMS/checkForm','POST');
Route::rule('api/form/Fill', 'IRMS/fillForm','POST');
Route::rule('api/form/Create', 'IRMS/createFormForAllStudents');

Route::rule('api/account/add', 'SAS/create_account', 'POST');
Route::rule('api/account/login', 'SAS/login', 'POST');
Route::rule('api/account/delete', 'SAS/delete_account', 'POST');
Route::rule('api/account/usrname', 'SAS/get_userid');
Route::rule('api/account/student_add', 'SAS/add_student', 'POST');
Route::rule('api/account/teacher_add', 'SAS/add_teacher', 'POST');
Route::rule('api/account/landlord_add', 'SAS/add_landlord', 'POST');
Route::rule('api/account/admin_add', 'SAS/add_admin', 'POST');
Route::rule('api/account/user_get', 'SAS/get_user', 'POST');

Route::rule('api/report/get', 'SAS/get_report');
Route::rule('api/report/review', 'SAS/review_report', 'POST');