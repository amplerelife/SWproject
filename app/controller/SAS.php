<?php

namespace app\controller;

use app\BaseController;
use app\model\Account;
use app\model\Admin;
use app\model\Advertisement;
use app\model\Bulletin_board_content;
use app\model\Landlord;
use app\model\Post;
use app\model\Report;
use app\model\Student;
use app\model\Teacher;
use app\model\Visitform;
use think\Request;
use think\Route;


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
            Student::where('usrname', $usrname)->delete();  //學生帳號一起刪除
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

    public function add_student(Request $request)   //填寫學生資料
    {
        $data = $request->post();
        $usrname = $data['usrname'];
        $result = Student::where('usrname', $usrname)->find();

        if ($result) { //修改
            $result->usrname = $data['usrname'];
            $result->student_id = $data['student_id'];
            $result->student_name_ch = $data['student_name_ch'];
            $result->student_name_eng = $data['student_name_eng'];
            $result->email = $data['email'];
            $result->grade = $data['grade'];
            $result->gender = $data['gender'];
            $result->phone = $data['phone'];
            $result->teacher_id = $data['teacher_id'];
            $result->home_address = $data['home_address'];
            $result->home_phone = $data['home_phone'];
            $result->home_contact = $data['home_contact'];
            $result->save();
            return json(['message' => 'Change']);
        } else {   //新增
            $student = new Student();
            $student->usrname = $data['usrname'];
            $student->student_id = $data['student_id'];
            $student->student_name_ch = $data['student_name_ch'];
            $student->student_name_eng = $data['student_name_eng'];
            $student->email = $data['email'];
            $student->grade = $data['grade'];
            $student->gender = $data['gender'];
            $student->phone = $data['phone'];
            $student->teacher_id = $data['teacher_id'];
            $student->home_address = $data['home_address'];
            $student->home_phone = $data['home_phone'];
            $student->home_contact = $data['home_contact'];
            $student->save();
            return json(['message' => 'Add']);
        }

    }

    public function add_teacher(Request $request)
    {
        $data = $request->post();
        $usrname = $data['usrname'];
        $result = Teacher::where('usrname', $usrname)->find();
        //return $result;
        if ($result) { //修改
            $result->usrname = $data['usrname'];
            $result->teacher_id = $data['teacher_id'];
            $result->teacher_name_ch = $data['teacher_name_ch'];
            $result->teacher_name_eng = $data['teacher_name_eng'];
            $result->email = $data['email'];
            $result->gender = $data['gender'];
            $result->level = $data['level'];
            $result->phone = $data['phone'];
            $result->office_address = $data['office_address'];
            $result->office_phone = $data['office_phone'];
            $result->save();
            return json(['message' => 'Change']);
        } else {   //新增
            $teacher = new Teacher();
            $teacher->usrname = $data['usrname'];
            $teacher->teacher_id = $data['teacher_id'];
            $teacher->teacher_name_ch = $data['teacher_name_ch'];
            $teacher->teacher_name_eng = $data['teacher_name_eng'];
            $teacher->email = $data['email'];
            $teacher->gender = $data['gender'];
            $teacher->level = $data['level'];
            $teacher->phone = $data['phone'];
            $teacher->office_address = $data['office_address'];
            $teacher->office_phone = $data['office_phone'];
            $teacher->save();
            return json(['message' => 'Add']);
        }
    }

    public function add_landlord(Request $request)
    {
        $data = $request->post();
        $usrname = $data['usrname'];
        $result = Landlord::where('usrname', $usrname)->find();
        if ($result) { //修改
            $result->landlord_id = $data['landlord_id'];
            $result->usrname = $data['usrname'];
            $result->landlord_name_ch = $data['landlord_name_ch'];
            $result->landlord_name_eng = $data['landlord_name_eng'];
            $result->email = $data['email'];
            $result->gender = $data['gender'];
            $result->phone = $data['phone'];
            $result->address = $data['address'];
            $result->save();
            return json(['message' => 'Change']);
        } else {   //新增
            $landlord = new Landlord();
            $landlord->landlord_id = $data['landlord_id'];
            $landlord->usrname = $data['usrname'];
            $landlord->landlord_name_ch = $data['landlord_name_ch'];
            $landlord->landlord_name_eng = $data['landlord_name_eng'];
            $landlord->email = $data['email'];
            $landlord->gender = $data['gender'];
            $landlord->phone = $data['phone'];
            $landlord->address = $data['address'];
            $landlord->save();
            return json(['message' => 'Add']);
        }
    }

    public function add_admin(Request $request)
    {
        $data = $request->post();
        $usrname = $data['usrname'];
        $result = Admin::where('usrname', $usrname)->find();
        if ($result) {
            $result->usrname = $data['usrname'];
            $result->admin_id = $data['usrname'];
            $result->admin_name_ch = $data['admin_name_ch'];
            $result->admin_name_eng = $data['admin_name_eng'];
            $result->email = $data['email'];
            $result->gender = $data['gender'];
            $result->phone = $data['phone'];
            $result->save();
            return json(['message' => 'Change']);
        } else {
            $admin = new Admin();
            $admin->usrname = $data['usrname'];
            $admin->admin_id = $data['usrname'];
            $admin->admin_name_ch = $data['admin_name_ch'];
            $admin->admin_name_eng = $data['admin_name_eng'];
            $admin->email = $data['email'];
            $admin->gender = $data['gender'];
            $admin->phone = $data['phone'];
            $admin->save();
            return json(['message' => 'Add']);
        }
    }

    public function get_user(Request $request)
    {
        $data = $request->post();
        $usrname = $data['usrname'];
        $usrtype = $data['usrtype'];
        if ($usrtype == 'student') {
            return json([Student::where('usrname', $usrname)->select()]);
        } else if ($usrtype == 'teacher') {
            return json([Teacher::where('usrname', $usrname)->select()]);
        } else if ($usrtype == 'landlord') {
            return json([Landlord::where('usrname', $usrname)->select()]);
        } else if ($usrtype == 'admin') {
            return json([Admin::where('usrname', $usrname)->select()]);
        } else {
            return json(["message" => "Wrong Type"]);
        }
    }

    public function bull_add(Request $request)
    {
        $data = $request->post();
        $admin = $data['admin_id'];
        $detail = $data['detail'];
        $test = Bulletin_board_content::select();
        //$del->delete();

        if ($test->isEmpty()) {
            $result = new Bulletin_board_content();
            $result->content_id = 0;
            $result->admin_id = $admin;
            $result->detail = $detail;
            $result->date = date("Y-m-d");
            $result->save();
            return json(['message' => 'Add']);
        } else {
            $number = Bulletin_board_content::order('content_id', 'desc')->find()->content_id;
            $result = new Bulletin_board_content();
            $result->content_id = $number + 1;
            $result->admin_id = $admin;
            $result->detail = $detail;
            $result->date = date("Y-m-d H:i:s");
            $result->save();
            return json(['message' => 'Add']);
        }

    }

    public function bull_get()
    {
        $data = Bulletin_board_content::select();
        return json($data);
    }

    public function bull_change(Request $request)
    {
        $data = $request->post();

        $bull = Bulletin_board_content::where('content_id', $data['content_id'])->find();
        $bull->detail = $data['detail'];
        $bull->date = date("Y-m-d H:i:s");
        $bull->save();
        return json(['message' => 'Change']);
    }

    public function bull_delete(Request $request)
    {
        $data = $request->post();
        $bull = Bulletin_board_content::where('content_id', $data['content_id'])->find();
        $bull->delete();
        return json(['message' => 'Delete']);
    }

    public function check_report(Request $request)
    {
        $data = $request->post();
        $id = $data['report_detail'];
        $prefix = preg_replace('/[0-9]/', '', $id); // 提取字母部分
        if ($prefix == 'A') {
            $result = Advertisement::where('ADV_ID', $id)->find();
            return json(['content'=>$result['ADV_content']]);
        } else {
            $result = Post::where('post_id', $id)->find();
            return json(['content'=>$result['post_detail']]);
        }


    }


}