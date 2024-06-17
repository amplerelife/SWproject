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

use think\facade\Request;

Route::get('think/:version', function ($version) {
    return 'hello,ThinkPHP' . $version . '!';
});

Route::rule('api/ad/reportAd', 'Ad/reportAd','POST');
Route::rule('api/ad/addAdLike', 'Ad/addAdLike','POST');
Route::rule('api/ad/addAdComment', 'Ad/addAdComment','POST');
Route::rule('api/ad/showAdComment', 'Ad/showAdComment','POST');
Route::rule('api/ad/showAds', 'Ad/showAds','POST');
Route::rule('api/ad/adDetail', 'Ad/ad_detail','POST');

Route::rule('api/post/reportPost', 'Posts/reportPost','POST');
Route::rule('api/post/addPostLike', 'Posts/addPostLike','POST');
Route::rule('api/post/addPostComment', 'Posts/addPostComment','POST');
Route::rule('api/post/showPostComment', 'Posts/showPostComment','POST');
Route::rule('api/post/showPosts', 'Posts/showPosts','POST');
Route::rule('api/post/postDetail', 'Posts/postDetail','POST');
Route::rule('api/post/createPost', 'Posts/createPost','POST');
Route::rule('api/post/deletePost', 'Posts/deletePost','POST');

Route::rule('api/form/Check', 'IRMS/checkForm','POST');
Route::rule('api/form/Fill', 'IRMS/fillForm','POST');
Route::rule('api/form/Create', 'IRMS/createFormForAllStudents');

Route::rule('api/account/teacher/students','SAS/teacher_students');
Route::rule('api/account/uploadHouseData', 'EditProfile/uploadHouseData','POST');
Route::rule('api/account/ChangePassword', 'EditProfile/changePassword','POST');
Route::rule('api/account/add', 'SAS/create_account', 'POST');
Route::rule('api/account/login', 'SAS/login', 'POST');
Route::rule('api/account/delete', 'SAS/delete_account', 'POST');
Route::rule('api/account/usrname', 'SAS/get_userid');
Route::rule('api/account/student_add', 'SAS/add_student', 'POST');
Route::rule('api/account/teacher_add', 'SAS/add_teacher', 'POST');
Route::rule('api/account/landlord_add', 'SAS/add_landlord', 'POST');
Route::rule('api/account/admin_add', 'SAS/add_admin', 'POST');
Route::rule('api/account/user_get', 'SAS/get_user', 'POST');
Route::rule('api/account/login_get', 'SAS/get_login_user');

Route::rule('api/bull/bull_add', 'SAS/bull_add', 'POST');
Route::rule('api/bull/bull_get', 'SAS/bull_get');
Route::rule('api/bull/bull_change', 'SAS/bull_change','POST');
Route::rule('api/bull/bull_delete', 'SAS/bull_delete','POST');


Route::rule('api/report/get', 'SAS/get_report');
Route::rule('api/report/review', 'SAS/review_report', 'POST');
Route::rule('api/report/check', 'SAS/check_report', 'POST');
Route::rule('api/report/delete', 'SAS/delete_report', 'POST');


Route::rule('api/AD/add', 'HMS/ad_create', 'POST');
Route::rule('api/AD/change', 'HMS/ad_change', 'POST');
Route::rule('api/AD/delete', 'HMS/ad_delete', 'POST');
Route::rule('api/AD/show/user', 'HMS/ad_show_landlord');
Route::rule('api/AD/show/admin', 'HMS/ad_show_admin');
Route::rule('api/AD/show/unchek', 'HMS/ad_show_uncheck');
Route::rule('api/AD/review', 'HMS/ad_review', 'POST');
