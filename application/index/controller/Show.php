<?php
namespace app\index\controller;


use app\admin\common\Base;
use app\admin\model\Film;
use app\admin\model\Tv;
use think\Request;

class Show extends Base{
    public function index(Request $request)
    {

        $name = $request->param('name');
        $id = $request->param('id');
        if('film'==$name){
            $data = Film::get($id);
        }else{
            $data = Tv::get($id);
        }
        $this->assign('data',$data);

        return $this->fetch('index');
    }
}
