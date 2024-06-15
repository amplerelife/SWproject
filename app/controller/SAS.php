<?php

namespace app\controller;

use app\BaseController;
use app\model\Account;
use app\model\Report;
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
                return json(['status' => 'error', 'message' => 'Invalid password format.']);
            }
            $account = new Account();
            // 創建新的帳號
            $account->usrname = $usrname;
            $account->password = $password;
            $account->usertype = $usertype;
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
            if ($password == $account->password) {
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
            Report::where('usrname', $usrname)->delete();
            $account->delete();
            return json(['status' => 'success', 'message' => 'Account deleted successfully']);
        } else {
            return json(['status' => 'error', 'message' => 'Username not exists']);
        }
    }

    public function get_userid()    //回傳全部帳號的id
    {
        $usr = Account::column('usrname');
        return json(['usrname' => $usr]);
    }

    public function get_report()
    {
        $id = Report::select()->column('report_id');
        $name = Report::select()->column('usrname');
        $detail = Report::select()->column('report_detail');
        $res = Report::select()->column('report_response');

        return json(['report_id' => $id, 'usrname' => $name, 'report_detail' => $detail, 'report_response' => $res]);
    }

    public function review_report(Request $request) //填寫舉報通過或不通過
    {
        $data = $request->post();

        // 查找 report_id 对应的记录
        $report = Report::where('report_id', $data['report_id'])->find();

        if ($report) {
            // 设置 report_response 属性
            $report->report_response = $data['report_response'];

            // 保存更改
            $report->save();

            return json(['status' => 'success', 'message' => 'Report reviewed successfully']);
        } else {
            return json(['status' => 'error', 'message' => 'Report not found']);
        }
    }


}