<?php
namespace app\index\controller;


use app\admin\common\Base;

class Film extends Base{

    public function index()
    {
        return $this->fetch('film_down');
    }
}
