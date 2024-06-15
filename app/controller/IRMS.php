<?php

namespace app\controller;

use app\BaseController;
use app\model\Visitform;
use app\model\Visitform_student;
use app\model\Visitform_teacher;
use think\facade\Db;
use think\Request;

class IRMS extends BaseController
{
    public function index() //默認方法
    {
        return $this->app->getBasePath();
    }

    /**
     * 為每一個學生建立表單號。
     * 如果學生已經有表單號，則不重複創建。
     */
    public function createFormForAllStudents()
    {
        // 獲取所有學生資料
        $students = Db::table('student')->select();
        $flow_id = Visitform::count(); // 流水號

        // 檢查是否有學生資料
        if ($students) {
            // 遍歷每一個學生
            foreach ($students as $student) {
                $student_id = $student['student_id'];
                // 檢查是否已經有表單號
                $existingForm = Visitform::where('student_id', $student_id)->find();
                
                if (!$existingForm) {
                    // 創建訪視紀錄
                    $visitform = new Visitform();
                    $visitform->visitform_id = $flow_id;
                    $visitform->teacher_id = $student['teacher_id'];
                    $visitform->student_id = $student_id;
                    $visitform->date = '';
                    $visitform->phone = '';

                    // 保存到資料庫
                    $visitform->save();

                    // 在 visitform_student 中新增一筆資料
                    Db::table('visitform_student')->insert([
                        'visitform_id' => $visitform->visitform_id,
                        'address' => '',
                        'rent' => ''
                    ]);

                    // 更新流水號
                    $flow_id++;
                } else {
                    // 如果visitform已經有表單，且沒有visitform_student紀錄，則創建
                    if(!Visitform_student::where('visitform_id', $existingForm['visitform_id'])->find()){
                        Visitform_student::insert([
                            'visitform_id' => $existingForm['visitform_id'],
                        ]);
                    }
                    
                    if(!Visitform_teacher::where('visitform_id', $existingForm['visitform_id'])->find()){
                        Visitform_teacher::insert([
                            'visitform_id' => $existingForm['visitform_id'],
                        ]);
                    }
                    
                }
            }

            // 返回成功信息
            return json(['status' => 'success', 'message' => 'Forms created and updated successfully']);
        } else {
            // 返回錯誤信息
            return json(['status' => 'error', 'message' => 'No students found']);
        }
    }
    /*
    public function fillForm(Request $request)
    {
        $param = $request->post();
    //  return json($param);
        if (isset($param['usertype']) == "student") {
            // 根據 student_id 查詢學生的訪視紀錄
            $visitform = Visitform::where('student_id', $param['student_id'])->find();

            if ($visitform) {
                // 更新訪視紀錄的其他欄位
                foreach ($data as $key => $value) {
                    $visitform->$key = $value;
                }

                // 保存更新後的訪視紀錄
                $visitform->save();

                return json(['status' => 'success', 'message' => 'Form updated successfully']);
            } else {
                return json(['status' => 'error', 'message' => "{$student_id}沒有創建表單，請先創建表單]);"]);
            }
        } else {
            return json(['status' => 'error', 'message' => 'Invalid user type']);
        }
            
    }*/

}
