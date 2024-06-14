<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;

//引入父類


class User extends BaseController
{
    public function index()//默認方法
    {
        return $this->app->getBasePath();
        //return $this->request->action();
    }


    public function get()
    {
        $user = Db::table('account')->select();
        return $user;
    }

    public function create_account($id, $password, $type)//創建新帳號
    {
        $exist = Db::name('account')->where('username', $id)->find(); //檢查帳號是否已存在

        if ($exist) {
            return json(['status' => 'error', 'message' => 'Username already exists']);
        } elseif (strlen($password) < 5 ||
            !preg_match('/[A-Z]/', $password) ||
            !preg_match('/[a-z]/', $password) ||
            !preg_match('/[0-9]/', $password)) {
            return json(['status' => 'error', 'message' => 'Password must be at least 5 characters long and include uppercase, lowercase, numbers, and special characters.']);
        } else {    //創建新的帳號
            Db::name('account')->insert(['username' => $id, 'password' => $password, 'usertype' => $type]);
            return json(['status' => 'success', 'message' => 'Account created successfully']);
        }
    }

    public function login($id, $password) //登入
    {
        $exist = Db::name('account')->where('username', $id)->find(); //檢查帳號是否已存在
        if ($exist) {
            if ($password == $exist['password']) {    //帳密正確，回傳type
                return json(['status' => 'success', 'usertype' => $exist['usertype']]);
            } else {
                return json(['status' => 'error', 'message' => 'Password incorrect']);
            }
        } else {
            return json(['status' => 'error', 'message' => 'Username not exists']);
        }
    }

    public function delete_account($id) //刪除帳號
    {
        Db::table('account')->where('username', $id)->delete();
        return json(['status' => 'success', 'message' => 'Account deleted successfully']);
    }


}