<?php
namespace app\index\controller;


use app\admin\common\Base;
use app\admin\model\Tv as TvModel;
use think\Request;
use think\Cache;


class Tv extends Base{

    public function index()
    {
        $film = TvModel::order('id','desc')->paginate(12);
        $this->assign('film',$film);

        $this->assign('type_name','不限');
        $this->assign('country_name','不限');
        $this->assign('release_time','不限');
        $this->assign('score_num','不限');
        $this->assign('order_name','更新时间');

        Cache::set('type_name','不限');
        Cache::set('country_name','不限');
        Cache::set('release_time','不限');
        Cache::set('score_num','不限');
        Cache::set('order_name','更新时间');

        $data = loadSelectData();
        $this->assign('country',$data['country']);
        $this->assign('release',$data['release']);
        $this->assign('type',$data['type']);
        return $this->fetch('tv_down');
    }
    //电影主页，更换查询状态
    public function change(Request $request)
    {
        $name = $request->param('name');
        $data = [];
        switch ($name){
            case 'type':
                $type_name = $request->param('type_name');
                Cache::set('type_name',$type_name);
                break;
            case 'country':
                $country_name = $request->param('country_name');
                Cache::set('country_name',$country_name);
                break;
            case 'release':
                $release_time = $request->param('release_time');
                Cache::set('release_time',$release_time);
                break;
            case 'score':
                $score_num = $request->param('score_num');
                Cache::set('score_num',$score_num);
                break;
            case 'order':
                $order_name = $request->param('order_name');
                Cache::set('order_name',$order_name);
                break;
        }

        if('不限'!=Cache::get('type_name')){
            $data['type']=Cache::get('type_name');
        }
        if('不限'!=Cache::get('country_name')){
            $data['country']=Cache::get('country_name');
        }
        if('不限'!=Cache::get('release_time')){
            $data['release']=Cache::get('release_time');
        }
        if('更新时间'!=Cache::get('order_name')){
            $film = TvModel::order('score','desc')->where($data)->paginate(12);
        }else{
            $film = TvModel::order('update_time','desc')->where($data)->paginate(12);
        }

        $this->share($film);
        return $this->fetch('tv_down');
    }

    private function share($film){
        $this->assign('type_name',Cache::get('type_name'));
        $this->assign('country_name',Cache::get('country_name'));
        $this->assign('release_time',Cache::get('release_time'));
        $this->assign('score_num',Cache::get('score_num'));
        $this->assign('order_name',Cache::get('order_name'));

        $this->assign('film',$film);
        $data = loadSelectData();
        $this->assign('country',$data['country']);
        $this->assign('release',$data['release']);
        $this->assign('type',$data['type']);

    }
}
