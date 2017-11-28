<?php
namespace app\index\controller;


use app\admin\common\Base;
use app\admin\model\Film;
use app\admin\model\Tv;
use think\Cookie;
use think\Request;

class Shop extends Base{
    public function index(Request $request)
    {



//        if('film'==$name || '电影'==$name){
//            $data = Film::get($id);
//        }else{
//            $data = Tv::get($id);
//        }
//        $this->assign('data',$data);
//
//        return $this->fetch('index');

        $status = 1;
        $message = '删除成功';
        return ['status' => $status, 'message' => $message];
    }

    //加入购物车
    function addCart(Request $request){

        //物品信息
        $id = $request->param('id');
        $type_name = $request->param('type_name');
        $name = $request->param('name');
        $image = $request->param('image');
        $country = $request->param('country');
        $release = $request->param('release');

        $cur_cart_array = unserialize(stripslashes(Cookie::get('shop_cart_info')));
        if($cur_cart_array==""){

            $cart_info[0][] = $id;
            $cart_info[0][] = $type_name;
            $cart_info[0][] = $name;
            $cart_info[0][] = $image;
            $cart_info[0][] = $country;
            $cart_info[0][] = $release;
            Cookie::set("shop_cart_info",serialize($cart_info),3600);
        }else{
        //返回数组键名倒序取最大
            $ar_keys = array_keys($cur_cart_array);
            rsort($ar_keys);
            $max_array_keyid = $ar_keys[0]+1;
        //遍历当前的购物车数组
        //遍历每个商品信息数组的0值，如果键值为0且货号相同则购物车存在相同货品
            foreach($cur_cart_array as $goods_current_cart){
                foreach($goods_current_cart as $key=>$goods_current_id){
                    if($key == 0 and $goods_current_id == $id){
                        $status = 0;
                        $message = '以添加相同影片';
                        return ['status' => $status, 'message' => $message];
                    }
                }
            }
            $cur_cart_array[$max_array_keyid][] = $id;
            $cur_cart_array[$max_array_keyid][] = $type_name;
            $cur_cart_array[$max_array_keyid][] = $name;
            $cur_cart_array[$max_array_keyid][] = $image;
            $cur_cart_array[$max_array_keyid][] = $country;
            $cur_cart_array[$max_array_keyid][] = $release;
            Cookie::set("shop_cart_info",serialize($cur_cart_array),3600);
        }
        $status = 1;
        return ['status' => $status];
    }
    //从购物车删除
    function delCart($goods_array_id){
          $cur_goods_array = unserialize(stripslashes(Cookie::get('shop_cart_info')));
        //删除该商品在数组中的位置
        unset($cur_goods_array[$goods_array_id]);
        Cookie::set("shop_cart_info",serialize($cur_goods_array),3600);
    }
    //修改购物车货品数量(品美高清网站暂时用不上)
    function update_cart($up_id,$up_num,$goods_ids){
        //先清空cookie,以便重新设置，传递过来三个数组参数 1数组的标识 2商品数量数组 3商品编号数组
        //如果不清空cookie则无法处理数量为零的商品
        setcookie("shop_cart_info","");
        foreach($up_id as $song){
        //先返回数组当前单元；再把指针向下移动一个位置
            $goods_nums = current($up_num);
            $goods_id = current($goods_ids);
            next($up_num);
            next($goods_ids);
        //当商品数量为空的时候，注销此处的数组值并用continue 2 语句避开下面的操作，继续做foreach循环
            while($goods_nums == 0){
                unset($song);
                continue 2;
            }
            $cur_goods_array[$song][0] = $goods_id;
            $cur_goods_array[$song][1] = $goods_nums;
        }
        setcookie("shop_cart_info",serialize($cur_goods_array));
    }

}
