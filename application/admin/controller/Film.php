<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Cache;
use think\Request;
use app\admin\model\Film as FilmModel;



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
        $this->assign2html();

        return $this->fetch('film_add');
    }

    private function assign2html(){
        $data = loadSelectData();
        $this->assign('country',$data['country']);
        $this->assign('drive',$data['drive']);
        $this->assign('format',$data['format']);
        $this->assign('release',$data['release']);
        $this->assign('type',$data['type']);
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
        $this->assign2html();
        return $this->fetch('film_edit');

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
