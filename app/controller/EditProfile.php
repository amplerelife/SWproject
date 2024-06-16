<?php

namespace app\controller;

use app\BaseController;
use think\Request;
use app\model\Account;
use app\model\Student_rent;

class EditProfile extends BaseController
{
    public function changePassword(Request $request){
        $param = $request->post();
        // 查找帳戶
        $account = Account::where('usrname', $param['usrname'])->find();
    
        if (!$account) {
            return json(['status' => 'error', 'message' => 'Account not found']);
        }
        // 驗證舊密碼是否正確（假設密碼已加密）
        if ($param['oldpassword'] != $account->password) {
            return json(['status' => 'error', 'message' => 'Old password is incorrect']);
        }
    
        // 檢查新密碼格式
        if (!preg_match('/[a-zA-Z0-9]/', $param['newpassword'])) {
            return json(['status' => 'error', 'message' => 'New password does not meet the required format']);
        }
    
        // 更新密碼並加密
        $account->password = $param['newpassword'];
        $account->save();
    
        return json(['status' => 'success', 'message' => 'Password changed successfully']);
    }


public function uploadHouseData(Request $request){
    $param = $request->post();
    // 準備資料
    $data = [
        'student_id' => $param['student_id'],
        'address' => $param['address'],
        'grade' => $param['grade'],
        'landlord_id' => $param['landlord_id'],
        'semester' => $param['semester'],
        'rent' => $param['rent'],
        'roommate' => $param['roommate'],
    ];
    
    try {
        // 插入資料到student_rent表
        $studentRent = new Student_rent();
        $result = $studentRent->save($data);
        
        if ($result) {
            return json(['status' => 'success', 'message' => 'Data uploaded successfully']);
        } else {
            return json(['status' => 'error', 'message' => 'Failed to upload data']);
        }
    } catch (\Exception $e) {
        return json(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
}

    
}