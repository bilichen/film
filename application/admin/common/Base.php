<?php

namespace app\admin\common;

use app\admin\model\System;
use think\Controller;
use think\Request;
use think\Session;

class Base extends Controller{
    //自动运行初始化方法
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub

        define('USER_ID',Session::get('user_id'));
        $this->getStatus();
    }

    //是否以登录
    public function isLogin(){
        if(is_null(USER_ID)){
            $this->error('请登录后进行操作...','login/index');
        }
    }
    //是否重复登录
    public function repeatLogin(){
        if(!is_null(USER_ID)){
            $this->error('用户以登录...','index/index');
        }
    }

    public function getStatus(){
       $request = Request::instance();//获取当前请求对象
        if($request->module()!= 'admin'){//判断当前请求对象所运行的模块是否admin,false=前台
            $system = System::get(1);//获取db中网站数据
            if($system['is_close']== 1){//判断当前网站前台是否关闭1=关，0＝开
                $this->error('网站已关闭');
                exit();
            }
        }
    }
}