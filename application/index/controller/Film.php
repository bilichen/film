<?php
namespace app\index\controller;


use app\admin\common\Base;
use app\admin\model\Film as FilmModel;


class Film extends Base{

    public function index()
    {
        $film = FilmModel::order('id','desc')->paginate(12);
        $this->assign('film',$film);
        $data = loadSelectData();
        $this->assign('country',$data['country']);
        $this->assign('release',$data['release']);
        $this->assign('type',$data['type']);
        return $this->fetch('film_down');
    }
    //电影主页，更换类型查询
    public function changeType($name)
    {
        p($name);die;
        //
        $type_name =  Type::get($type_id);
//        p($film);die;
        $this->assign('film',$film);
        $this->assign2html();
        return $this->fetch('film_edit');

    }
}
