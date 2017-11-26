<?php
namespace app\index\controller;


use app\admin\common\Base;
use app\admin\model\Film;

class Index extends Base{
    public function index()
    {

        $film = Film::order('id','desc')->paginate(12);
        $this->assign('film',$film);
        return $this->fetch('index');
    }
}
