<?php
namespace app\controller;

class Error
{
    public function __call(string $name, array $arguments)
    {
       // return '不存在的控制器'.$name; //默認執行用戶輸入的控制器的index方法
        return json($arguments); //?name='hello'參數
    }
}