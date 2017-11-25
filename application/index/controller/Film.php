<?php
namespace app\index\controller;


use app\admin\common\Base;
use app\admin\model\Film as FilmModel;
use app\extra\Fpage;


class Film extends Base{

    public function index()
    {
        $film = FilmModel::order('id','desc')->paginate(12);
        $page=new Fpage($film->currentPage(),$film->lastPage());
//        p($page->pagelist());die;
        //渲染到模板的分页样式
        $this->assign('page', $page->pagelist());
//        p($data);die;
        $this->assign('film',$film);
        return $this->fetch('film_down');
    }
}
