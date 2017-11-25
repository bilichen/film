<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Cache;
use think\Request;
use app\admin\model\Film as FilmModel;
use app\admin\model\Country;
use app\admin\model\Drive;
use app\admin\model\Format;
use app\admin\model\Release;
use app\admin\model\Type;


class Film extends Base
{
    //显示电影列表
    public function index()
    {
//        $data = FilmModel::all(function($query){
//            $query->order('desc');
//        });
        $data =  FilmModel::order('id','desc')->paginate(10);

         $count =  FilmModel::count();
//        $data = collection($data)->toArray();
        $this->assign('data',$data);
        $this->assign('count',$count);
//        p($data);die;
        return $this->fetch('film_list');
    }

    //显示添加电影页面
    public function addIndex()
    {
       $this->loadSelectData();
        return $this->fetch('film_add');
    }


    public function upload(){
       //1、判断是否post提交
        if($this->request->isPost()){
            //2、获取提交过来的数据，最后true参数，表示连上传文件一起获取
            $data = $this->request->param(true);
            //3、获取上传的文件对象
            $file = $this->request->file('image');
            //4、判断上传的文件对象是否为空
            if(empty($file)){
                $this->error('上传文件不存在');
            }
            //5、对上传文件做出条件限制（类型，大小等）
            $map = [
                'ext'=>'jpg,png',//后辍名
                'size'=>3000000,//最大3M
            ];
            //6、对上传的文件进行较验，如果合格就进行转移到预定设定好的public/uploads目录下
            //返回保存的文件信息info，包括文件名和大小等数据
            $info = $file->validate($map)->move(ROOT_PATH . 'public/uploads');
            if(is_null($info)){
                $this->error($info->getError());
            }
            $data['image'] = $info->getSaveName();
            $data['update_time'] = time();

           $res = FilmModel::create($data);
            if(is_null($res)){
                $this->error('文件添加失败');
            }else{

                $this->success('文件添加成功...');
            }
        }

    }

    //编辑修改film页面
    public function edit($id)
    {
        //
        $film =  FilmModel::get($id);
//        p($film);die;
        $this->assign('film',$film);
        $this->loadSelectData();
        return $this->fetch('film_edit');

    }

    private function loadSelectData(){
        if(!Cache::get('film_country')){//没有缓存数据，进行读取数据库
            $country = Country::all();
            $this->assign('country',$country);
            $drive = Drive::all();
            $this->assign('drive',$drive);
            $format = Format::all();
            $this->assign('format',$format);
            $release = Release::all();
            $this->assign('release',$release);
            $type = Type::all();
            $this->assign('type',$type);

            Cache::set('film_country',$country,600);
            Cache::set('film_drive',$drive,600);
            Cache::set('film_format',$format,600);
            Cache::set('film_release',$release,600);
            Cache::set('film_type',$type,600);
        }else{
            $this->assign('country',Cache::get('film_country'));
            $this->assign('drive',Cache::get('film_drive'));
            $this->assign('format',Cache::get('film_format'));
            $this->assign('release',Cache::get('film_release'));
            $this->assign('type',Cache::get('film_type'));
        }
    }

    public function update(){
        $data = $this->request->param();
//        p($data);die;
       $res = FilmModel::where('id', $data['id'])->update($data);
        if(is_null($res)){
            $this->error('文件修改失败');
        }else{

            $this->success('文件修改成功...');
        }

    }

    //删除
    public function delete($id)
    {

        FilmModel::destroy($id);
        $status = 1;
        $message = '删除成功';
        return ['status' => $status, 'message' => $message];
    }
}
