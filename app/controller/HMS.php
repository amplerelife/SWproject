<?php

namespace app\controller;

use app\BaseController;
use app\model\Advertisement;
use app\model\Contract;
use think\Request;
class HMS extends BaseController
{
    public function contract_add(Request $request){
        $data = request()->post();
        $con = new Contract();
        $con->contract_id=$data['contract_id'];
    }
    public function adv_add(Request $request){
        $data = request()->post();
        $id = Advertisement::order('AVD_ID','desc')->value('AVD_ID');
        $prefix = preg_replace('/[0-9]/', '', $id); // 提取字母部分
        $number = preg_replace('/[^0-9]/', '', $id); // 提取数字部分
        $newNumber = (int)$number + 1;
        $newId = $prefix . $newNumber;
        $AD = new Advertisement();
        $AD->AVD_ID = $newId;
        $AD->rent_id = $data['rent_id'];
        $AD->ADV_title = $data['ADV_title'];
        $AD->usrname = $data['usrname'];
        $AD->ADV_content=$data['ADV_content'];
    }
}