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
        $data = request()->post();
        $id = Advertisement::order('ADV_ID','desc')->value('ADV_ID');
        $prefix = preg_replace('/[0-9]/', '', $id); // 提取字母部分
        $number = preg_replace('/[^0-9]/', '', $id); // 提取数字部分
        $newNumber = (int)$number + 1;

        $newId = $prefix . $newNumber;
        $AD = new Advertisement();

        $AD->ADV_ID = $newId;
        //$AD->rent_id = 'RE'.$newNumber;
        $AD->ADV_title = $data['title'];
        $AD->usrname = $_SESSION['now_usrid'];
        $AD->ADV_postdate = date('Y-m-d H:i:s');
        $AD->ADV_content=$data['content'];
        $AD->save();
        return json(['id'=>$newId]);
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
        $data = Advertisement::where('response','pass')->select();
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
                'response'=>$ad->response
            ];
        }

        return json($result);
    }
    public function ad_report(Request $request){
        $data = request()->post();
        $id = $data['id'];
        $report = Advertisement::where('ADV_ID',$id)->find();
        $report->response='';
        $report->save();
        return json(['message'=>'report success']);
    }
}