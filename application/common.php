<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Cache;

use app\admin\model\Country;
use app\admin\model\Drive;
use app\admin\model\Format;
use app\admin\model\Release;
use app\admin\model\Type;
// 应用公共文件
function p($array){
    dump($array,1,'<pre>',0);

}

function loadSelectData(){
//    p($this);die;
    if(!Cache::get('film_country')){//没有缓存数据，进行读取数据库
        $country = Country::all();
//        $obj->assign('country',$country);
        $drive = Drive::all();
//        $obj->assign('drive',$drive);
        $format = Format::all();
//        $obj->assign('format',$format);
        $release = Release::all();
//        $obj->assign('release',$release);
        $type = Type::all();
//        $obj->assign('type',$type);

        Cache::set('film_country',$country,600);
        Cache::set('film_drive',$drive,600);
        Cache::set('film_format',$format,600);
        Cache::set('film_release',$release,600);
        Cache::set('film_type',$type,600);
        $data = [
            'country'=>$country,
            'drive'=>$drive,
            'format'=>$format,
            'release'=>$release,
            'type'=>$type,
        ];
        return $data;
    }else{
//        $obj->assign('country',Cache::get('film_country'));
//        $obj->assign('drive',Cache::get('film_drive'));
//        $obj->assign('format',Cache::get('film_format'));
//        $obj->assign('release',Cache::get('film_release'));
//        $obj->assign('type',Cache::get('film_type'));
        $data = [
            'country'=>Cache::get('film_country'),
            'drive'=>Cache::get('film_drive'),
            'format'=>Cache::get('film_format'),
            'release'=>Cache::get('film_release'),
            'type'=>Cache::get('film_type'),
        ];
        return $data;
    }
}