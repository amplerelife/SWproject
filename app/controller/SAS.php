<?php

namespace app\controller;

use app\BaseController;
use app\model\Account;
use think\Request;
use think\facade\Db;

//引入父類


class SAS extends BaseController
{
    public function index()//默認方法
    {
        return $this->app->getBasePath();
        //return $this->request->action();
    }


    public function create_account(Request $request)    //新增帳號
    {
        $data = $request->post();

        // 检查必要的参数是否存在
        if (!isset($data['usrname']) || !isset($data['password']) || !isset($data['usertype'])) {
            return json(['status' => 'error', 'message' => "Missing parameters"]);
        } else {
            // 获取参数
            $usrname = $data['usrname'];
            $password = $data['password'];
            $usertype = $data['usertype'];

            $exist = Account::where('usrname', $usrname)->find();
            if ($exist) {
                return json(['status' => 'error', 'message' => 'Username already exists']);
            }

            // 檢查密碼格式
            if (strlen($password) < 5 ||
                !preg_match('/[A-Z]/', $password) ||
                !preg_match('/[a-z]/', $password) ||
                !preg_match('/[0-9]/', $password)) {
                return json(['status' => 'error', 'message' => 'Password must be at least 5 characters long and include uppercase, lowercase, numbers, and special characters.']);
            }
            $account = new Account();
            // 創建新的帳號
            $account->usrname=$usrname;
            $account->password=$password;
            $account->usertype=$usertype;
            return json(['status' => 'success', 'message' => 'Account created successfully']);
        }

    }


    public function login(Request $request) //登入
    {
        $data = $request->post();
        $id = $data['usrname'];
        $password = $data['password'];
        $account = Account::where('usrname', $id)->find(); //檢查帳號是否已存在

        if ($account) {
            if ($password==$account->password) {
                return json(['status' => 'success', 'usertype' => $account->usertype]);
            } else {
                return json(['status' => 'error', 'message' => 'Password incorrect']);
            }
        } else {
            return json(['status' => 'error', 'message' => 'Username not exists']);
        }
    }

    public function delete_account(Request $request) //刪除帳號
    {
        $data = $request->post();

        // 检查必要参数
        if (!isset($data['usrname'])) {
            return json(['status' => 'error', 'message' => "Missing parameter 'usrname'"]);
        }

        // 获取用户名
        $usrname = $data['usrname'];

        // 查找并删除账号
        $account = Account::where('usrname', $usrname)->find();

        if ($account) {
            $account->delete();
            return json(['status' => 'success', 'message' => 'Account deleted successfully']);
        } else {
            return json(['status' => 'error', 'message' => 'Username not exists']);
        }
    }

    public function get_userid()    //回傳全部帳號的id
    {
        $usr = Db::table('account')->column('usrname');
        return json(['usrname' => $usr]);
    }

    public function get_report()
    {
        //$report = Db::table('report')->select();
        $id = Db::table('report')->column('report_id');
        $name = Db::table('report')->column('usrname');
        $detail = Db::table('report')->column('report_detail');
        $response = Db::table('report')->column('report_response');
        return json(['id' => $id, 'name' => $name, 'detail' => $detail, 'response' => $response]);
    }

    public function review_report($id)
    {
        $respone = Db::table('report')->where('report_id', $id)->value('report_response');
    }


}