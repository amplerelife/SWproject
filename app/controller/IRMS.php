<?php

namespace app\controller;

use app\BaseController;
use app\model\Visitform;
use app\model\Visitform_student;
use app\model\Visitform_teacher;
use think\facade\Db;
use think\Request;
use Exception;

class IRMS extends BaseController
{
    public function index() //默認方法
    {
        return $this->app->getBasePath();
    }

    /*
     * 為每一個學生建立訪問表單及相關紀錄。
     * 如果學生已經有訪問表單，則檢查並更新相關紀錄。
     * 如果學生尚未有訪問表單，則創建新的訪問表單及相關紀錄。
     *
     * @return json['status','message']
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
     * 填寫學生的訪問表單資料。
     * 根據傳入的 Request 物件，從 POST 參數中取得表單資料，並更新或創建相應的訪問表單紀錄。
     *
     * @param Request $request HTTP 請求物件，包含了用戶提交的表單資料
     * @return string JSON 格式的響應訊息，表示操作結果或錯誤訊息
     */
    public function fillForm(Request $request)
    {
        $param = $request->post();
        switch ($param['usertype']) {
            case "student":
                try {
                    $visitform = Visitform::where('student_id', $param['student_id'])->find();
                    if ($visitform) {
                        $visitform_student_part = Visitform_student::where('visitform_id', $visitform['visitform_id'])->find();
                        // 在這裡處理訪問表單學生填寫部分
                        $visitform_student_part->landlord_name = $param['landlord_name'];
                        $visitform_student_part->landlord_phone = $param['landlord_phone'];
                        $visitform_student_part->address = $param['address'];
                        $visitform_student_part->build_type = $param['build_type'];
                        $visitform_student_part->room_type = $param['room_type'];
                        $visitform_student_part->rent = $param['rent'];
                        $visitform_student_part->deposit = $param['deposit'];
                        $visitform_student_part->recommend = $param['recommend'];
                        $visitform_student_part->WoodOrIron = $param['WoodOrIron'];
                        $visitform_student_part->alarm = $param['alarm'];
                        $visitform_student_part->escapeRoute = $param['escapeRoute'];
                        $visitform_student_part->doorLock = $param['doorLock'];
                        $visitform_student_part->light = $param['light'];
                        $visitform_student_part->circuitSafe = $param['circuitSafe'];
                        $visitform_student_part->knowPhone = $param['knowPhone'];
                        $visitform_student_part->multiSocket = $param['multiSocket'];
                        $visitform_student_part->extinguisher = $param['extinguisher'];
                        $visitform_student_part->heater = $param['heater'];
                        $visitform_student_part->multiRoomBed = $param['multiRoomBed'];
                        $visitform_student_part->monitor = $param['monitor'];
                        $visitform_student_part->contract = $param['contract'];
                        // 保存修改
                        $visitform_student_part->save();
                        return json(['status' => 'success', 'message' => 'Form filled successfully']);
                    } else {
                        // 如果未找到相應的訪問表單，拋出異常
                        throw new Exception("找不到學生的訪問紀錄表單，請先創建表單");
                    }
                } catch (Exception $e) {
                    // 在這裡處理異常情況，例如記錄錯誤或返回異常訊息
                    return $e->getMessage();
                }
                break;
        
            case "teacher":
                try {
                    // 假設 $param 中包含老師填寫的所有參數
                    $visitform_teacher = Visitform_teacher::where('visitform_id', $param['visitform_id'])->find();
                
                    if ($visitform_teacher) {
                        // 更新老師填寫部分的資料
                        $visitform_teacher->request_rent = $param['request_rent'];
                        $visitform_teacher->bills = $param['bills'];
                        $visitform_teacher->enviroment = $param['enviroment'];
                        $visitform_teacher->enviroment_reason = $param['enviroment_reason'];
                        $visitform_teacher->live_enviroment = $param['live_enviroment'];
                        $visitform_teacher->live_enviroment_reason = $param['live_enviroment_reason'];
                        $visitform_teacher->now = $param['now'];
                        $visitform_teacher->now_reason = $param['now_reason'];
                        $visitform_teacher->relationship = $param['relationship'];
                        $visitform_teacher->visitResult = $param['visitResult'];
                        $visitform_teacher->visitResult_reason = $param['visitResult_reason'];
                        $visitform_teacher->other = $param['other'];
                        $visitform_teacher->care = $param['care'];
                        $visitform_teacher->care_reason = $param['care_reason'];
                
                        // 儲存修改
                        $visitform_teacher->save();
                        return json(['status' => 'success', 'message' => 'Form filled successfully']);
                    } else {
                        throw new Exception("找不到相應的訪問表單，請先創建表單");
                    }
                } catch (Exception $e) {
                    // 處理異常情況，例如記錄錯誤或返回異常訊息
                    return $e->getMessage();
                }
                break;
            default:
                return "未知的使用者類型";
        }
        
    }
    
}
