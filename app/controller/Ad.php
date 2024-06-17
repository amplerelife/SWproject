<?php

namespace app\controller;

use app\BaseController;
use think\Request;
use app\model\Account;
use app\model\Advertisement;
use app\model\Adv_comment;
use app\model\Report;

class Ad extends BaseController
{
    //瀏覽廣告功能 傳回全部廣告
    public function showAds()
    {
        try {
            // 從資料庫中選取廣告資料
            $data = Advertisement::select();
            // 將資料轉換為 JSON 格式並返回
            return json( $data);
        } catch (\Exception $e) {
            // 如果出現異常，返回錯誤訊息
            return json(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
    //查詢廣告功能 傳入廣告ID
    public function ad_detail(Request $request)
    {
        $adv_id = $request->param('ADV_ID');
        try {
            // 從資料庫中選取廣告資料
            $data = Advertisement::where('ADV_ID', $adv_id)->find();
            // 將資料轉換為 JSON 格式並返回
            return json( $data);
        } catch (\Exception $e) {
            // 如果出現異常，返回錯誤訊息
            return json(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
    //瀏覽廣告評論功能 傳入廣告ID
    public function showAdComment(Request $request)
    {
        $adv_id = $request->param('ADV_ID');
        try {
            // 從資料庫中選取廣告評論資料
            $data = Adv_comment::where('ADV_ID', $adv_id)->select();
            // 將資料轉換為 JSON 格式並返回
            return json( $data);
        } catch (\Exception $e) {
            // 如果出現異常，返回錯誤訊息
            return json(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
    //按讚功能 傳入廣告ID
    public function addAdLike(Request $request)
    {
        try {
            // 獲取傳入的廣告ID
            $adv_id = $request->param('ADV_ID');
            
            // 檢查廣告是否存在
            $advertisement = Advertisement::where('ADV_ID', $adv_id)->find();
            if (!$advertisement) {
                return json(['status' => 'error', 'message' => 'Advertisement not found']);
            }
            
            // 更新按讚數量
            $advertisement->ADV_likeNum += 1;
            $advertisement->save();
            
            return json(['status' => 'success', 'message' => 'Like added successfully']);
            
        } catch (\Exception $e) {
            return json(['status' => 'error', 'message' => 'Failed to add like: ' . $e->getMessage()]);
        }
    }
    //廣告評論功能 傳入廣告ID
    public function addAdComment(Request $request)
    {
        try {
            // 獲取傳入的廣告ID和評論內容
            $adv_id = $request->param('ADV_ID');
            $comment_detail = $request->param('comment_detail');
            $usrname = $request->param('usrname');
            $rate = $request->param('rate');
            $picture = $request->param('picture');

            $ids = Adv_comment::column('ADV_comment_id');
            $maxNumber = null;
            foreach ($ids as $id) {
                $number = preg_replace('/[^0-9]/', '', $id); // 提取数字部分
                $number = intval($number);

                // 比较并更新最大数字
                if ($maxNumber === null || $number > $maxNumber) {
                    $maxNumber = $number;
                }

            }
            $maxNumber += 1;
            $newId = 'AC' . $maxNumber;
            // 獲取目前最大的 ADV_comment_id，如果沒有資料，則設為 0
            //$max_id = Adv_comment::max('ADV_comment_id')+1 ?: 0;


            //return $max_id;
            // 創建新的廣告評論

            $comment = new Adv_comment();
            $comment->ADV_ID = $adv_id;
            $comment->ADV_comment_id = $newId;  // 根據最大值設定新的 ID
            session_start();
            $comment->usrname = $_SESSION['now_usrid'];
            $comment->comment_detail = $comment_detail;
            $comment->rate = $rate;
            $comment->picture = $picture;
            $comment->post_comment_time = date('Y-m-d H:i:s');  // 後端設定當下時間
            
            // 儲存評論
            $result = $comment->save();
            
            if ($result) {
                return json(['status' => 'success', 'message' => 'Comment added successfully']);
            } else {
                return json(['status' => 'error', 'message' => 'Failed to add comment']);
            }
            
        } catch (\Exception $e) {
            return json(['status' => 'error', 'message' => 'Database error:' . $e->getMessage()]);
        }
    }
    //廣告舉報功能 傳入廣告ID以及使用者ID
    public function reportAd(Request $request)
    {
        try {
            // 獲取傳入的廣告ID和使用者名稱
            $adv_id = $request->param('ADV_ID');
            $usrname = $request->param('usrname');
            
            // 獲取目前最大的 report_id，如果沒有資料，則設為 0
            $max_id = Report::order('report_id', 'desc')->find()->report_id?: 0;
            $max_id=preg_replace('/[^0-9]/', '', $max_id)+1;
            
            // 創建新的舉報記錄
            $report = new Report();
            $report->report_id = sprintf('R%d', $max_id);  // 根據最大值設定新的 ID
            $report->usrname = $usrname;
            $report->report_detail = "$adv_id";  // 可以自訂舉報的具體內容
            $report->report_response = '';  // 初始設定管理員處理進度為空
            
            // 儲存舉報記錄
            $result = $report->save();
            
            if ($result) {
                return json(['status' => 'success', 'message' => 'Advertisement reported successfully']);
            } else {
                return json(['status' => 'error', 'message' => 'Failed to report advertisement']);
            }
            
        } catch (\Exception $e) {
            return json(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
    
}