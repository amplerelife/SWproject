<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;

//引入父類


class User extends BaseController
{
    public function index()//默認方法
    {
        return $this->app->getBasePath();
        //return $this->request->action();
    }



}