<?php
namespace app\index\controller;


use app\admin\common\Base;
use app\admin\model\Film;
use app\admin\model\Tv;
use think\Request;

class Search extends Base{
    public function index(Request $request)
    {
        $search_name = $request->param('search_name');
        $map['name']=array('like','%'.$search_name.'%');
        $data1 = Film::order('id','desc')->where($map)->paginate(12);
        $data1_count = Film::where($map)->count();
        $data2 = Tv::order('id','desc')->where($map)->paginate(12);
        $data2_count = Tv::where($map)->count();

        $count = $data1_count+$data2_count;

        $data =  array_add($data1,$data2);//自定义函数，合并两个查询出来的结果（多表查询可能更方便，作为初学者，不会....）
//        p($data);die;

        $this->assign('data',$data);
        $this->assign('count',$count);
        $this->assign('search_name',$search_name);
        return $this->fetch('index');
    }
}
