<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;

class Index extends BaseController //類名必須要和檔案名一樣
{
    public function index()// http://localhost:8000/index.php/index/index
    {
        return '<style>*{ padding: 0; margin: 0; }</style><iframe src="https://www.thinkphp.cn/welcome?version=a' . \think\facade\App::version() . '" width="100%" height="100%" frameborder="0" scrolling="uto"></iframe>';
    }

}
