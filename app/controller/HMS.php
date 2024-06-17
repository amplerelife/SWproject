<?php

namespace app\controller;

use app\BaseController;
use app\model\Advertisement;
use app\model\Contract;
use app\model\Rent_information;
use app\model\Report;
use think\Request;
include 'SAS.php';
class HMS extends BaseController
{
    public function ad_create(Request $request){
        try {
            session_start();
            //return $_SESSION['now_usrid'];
            $data = request()->post();
            $ids = Advertisement::column('ADV_ID');
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
            $newId = 'A' . $maxNumber;
            $AD = new Advertisement();
    
            $AD->ADV_ID = $newId;
            $AD->rent_id = 'RE'.$maxNumber;
            $AD->ADV_title = $data['title'];
            $AD->usrname = $_SESSION['now_usrid'];
            //$AD->usrname = $data['usrname'];
            $AD->ADV_postdate = date('Y-m-d H:i:s');
            $AD->ADV_content=$data['content'];
            $AD->picture = '';
            $AD->ADV_likeNum = 0;
            $AD->save();
            return json(['id'=>$newId]);
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function ad_change(Request $request){
        $data = request()->post();
        $id = $data['id'];
        $AD = Advertisement::where('ADV_ID',$id)->find();

        $AD->ADV_title = $data['title'];
        $AD->ADV_postdate = date('Y-m-d H:i:s');
        $AD->ADV_content=$data['content'];
        $AD->save();
        return json(['message'=>'change success']);
    }
    public function ad_delete(Request $request){
        $data = request()->post();
        $id = $data['id'];
        $AD = Advertisement::where('ADV_ID',$id)->find();
        $AD->delete();
        return json(['message'=>'delete success']);
    }
    public function ad_show_landlord()
    {
        $data = Advertisement::where('response', '已處理')->select();
        $result = [];

        foreach ($data as $ad) {
            $result[] = [
                'id' => $ad->ADV_ID,
                'title' => $ad->ADV_title,
                'content' => $ad->ADV_content,
                'time' => $ad->ADV_postdate,
                'name' => $ad->usrname
            ];
        }

        return json($result);
    }


    public function ad_show_admin()
    {
        $data = Advertisement::select();
        $result = [];

        foreach ($data as $ad) {
            $result[] = [
                'id' => $ad->ADV_ID,
                'title' => $ad->ADV_title,
                'content' => $ad->ADV_content,
                'time' => $ad->ADV_postdate,
                'name' => $ad->usrname,
                'response' => $ad->response
            ];
        }

        return json($result);
    }


    public function ad_report(Request $request){
        $data = request()->post();
        $id = $data['id'];
        $report = Advertisement::where('ADV_ID',$id)->find();
        $report->save();
        return json(['message'=>'report success']);
    }
    public function ad_review(Request $request){
        $data = request()->post();
        $id = $data['id'];
        $status = $data['response'];
        $report = Advertisement::where('ADV_ID',$id)->find();
        $report->response = $status;
        $report->save();
        return json(['message'=>'改變審核狀態']);
    }
    public function ad_show_uncheck(Request $request){
        $data = Advertisement::where('response', '未處理')->select();
        $result = [];

        foreach ($data as $ad) {
            $result[] = [
                'id' => $ad->ADV_ID,
                'title' => $ad->ADV_title,
                'content' => $ad->ADV_content,
                'time' => $ad->ADV_postdate,
                'name' => $ad->usrname
            ];
        }
        return json($result);
    }

}