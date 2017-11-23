<?php
namespace app\index\controller;


use app\admin\common\Base;

class Tv extends Base{

    public function index()
    {
        return $this->fetch('tv_down');
    }
}
