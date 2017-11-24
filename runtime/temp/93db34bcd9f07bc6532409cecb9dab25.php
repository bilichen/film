<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"E:\xampp\htdocs\film\public/../application/admin\view\film\film_list.html";i:1511513030;s:72:"E:\xampp\htdocs\film\public/../application/admin\view\public\header.html";i:1511416120;s:74:"E:\xampp\htdocs\film\public/../application/admin\view\public\admin_js.html";i:1511375776;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
    品美高清后台管理
  </title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="__STATIC__/admin/css/x-admin.css" media="all">
</head>

    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>影片管理</cite></a>
              <a><cite>电影列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick="banner_add('添加用户','<?php echo url("film/addIndex"); ?>','700','600')"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">共有数据：<?php echo $count; ?> 条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="">
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            片名
                        </th>
                        <th>
                            缩略图
                        </th>
                        <th>
                            类型
                        </th>
                        <th>
                            发行国家
                        </th>
                        <th>
                            盘符
                        </th>

                        <th>
                            容量
                        </th>
                        <th>
                            格式
                        </th>
                        <th>
                            上映时间
                        </th>
                        <th>
                            更新时间
                        </th>
                        <th>
                            评分
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody id="x-img">
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                            <td>
                                <input type="checkbox" value="1" name="">
                            </td>
                            <td>
                                <?php echo $vo['id']; ?>
                            </td>
                            <td>
                                <?php echo $vo['name']; ?>
                            </td>
                            <td>
                                <img  src="__ROOT__/uploads/<?php echo $vo['image']; ?>"  width="50">
                            </td>
                            <td >
                                <?php echo $vo['type']; ?>
                            </td>
                            <td >
                                <?php echo $vo['country']; ?>
                            </td>
                            <td >
                                <?php echo $vo['drive']; ?>
                            </td>
                            <td >
                                <?php echo $vo['size']; ?>
                            </td>
                            <td >
                                <?php echo $vo['format']; ?>
                            </td>
                            <td >
                                <?php echo $vo['release']; ?>年
                            </td>
                            <td >
                                <?php echo $vo['update_time']; ?>
                            </td>
                            <td >
                                <?php echo $vo['score']; ?>
                            </td>
                            <td class="td-manage">
                                <a style="text-decoration:none" onclick="banner_stop(this,'10001')" href="javascript:;" title="不显示">
                                    <i class="layui-icon">&#xe601;</i>
                                </a>
                                <a title="编辑" href="javascript:;" onclick="film_edit('编辑','<?php echo url("film/edit"); ?>'+'?id='+<?php echo $vo['id']; ?>,'4','','510')"
                                class="ml-5" style="text-decoration:none">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a title="删除" href="javascript:;" onclick="film_del('<?php echo $vo['name']; ?>','<?php echo $vo['id']; ?>')"
                                style="text-decoration:none">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                            </td>
                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
          <div style="text-align: center"><?php echo $data->render(); ?></div>
<!--            <div id="page"></div>-->
        </div>
        <script src="__STATIC__/admin/js/jquery.min.js"></script>
<script src="__STATIC__/admin/lib/layui/layui.js" charset="utf-8"></script>
<script src="__STATIC__/admin/js/x-admin.js"></script>
<script src="__STATIC__/admin/js/x-layui.js" charset="utf-8"></script>

<!--引入bootstrap-->
<!--<link rel="stylesheet" type="text/css" href="__STATIC__/admin/lib/bootstrap/css/bootstrap.css" />-->
<!--<script type="text/javascript" src="__STATIC__/admin/lib/bootstrap/js/bootstrap.js"></script>-->

        <link rel="stylesheet" type="text/css" href="__STATIC__/admin/lib/bootstrap/css/bootstrap.css" />
        <script type="text/javascript" src="__STATIC__/admin/lib/bootstrap/js/bootstrap.js"></script>
        <script>
            layui.use(['laydate','element','laypage','layer'], function(){
                $ = layui.jquery;//jquery
              laydate = layui.laydate;//日期插件
              lement = layui.element();//面包导航
              laypage = layui.laypage;//分页
              layer = layui.layer;//弹出层

              //以上模块根据需要引入

//                layer.ready(function(){ //为了layer.ext.js加载完毕再执行
//                  layer.photos({
//                    photos: '#x-img'
//                    //,shift: 5 //0-6的选择，指定弹出图片动画类型，默认随机
//                  });
//                });
              
            });

            //批量删除提交
             function delAll () {
                layer.confirm('确认要删除吗？',function(index){
                    //捉到所有被选中的，发异步进行删除
                    layer.msg('删除成功', {icon: 1});
                });
             }
             /*添加*/
            function banner_add(title,url,w,h){
                x_admin_show(title,url,w,h);
            }
             /*停用*/
            function banner_stop(obj,id){
                layer.confirm('确认不显示吗？',function(index){
                    //发异步把用户状态进行更改
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="banner_start(this,id)" href="javascript:;" title="显示"><i class="layui-icon">&#xe62f;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">不显示</span>');
                    $(obj).remove();
                    layer.msg('不显示!',{icon: 5,time:1000});
                });
            }

            /*启用*/
            function banner_start(obj,id){
                layer.confirm('确认要显示吗？',function(index){
                    //发异步把用户状态进行更改
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="banner_stop(this,id)" href="javascript:;" title="不显示"><i class="layui-icon">&#xe601;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已显示</span>');
                    $(obj).remove();
                    layer.msg('已显示!',{icon: 6,time:1000});
                });
            }
            // 编辑
            function film_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
            }

            /*-删除*/
            function cate_del(name,id){
                layer.confirm('确定要删除'+name+'影片吗？',{
                    btn:['确定','取消']
                },function(index){
                    layer.close(index);
                    console.log("点击了确定");
                    $.ajax({
                        type:'POST',
                        url:"<?php echo url('film/del'); ?>",
                        data: {"id":id},
                        dataType:"json",
                        success:function (data){
                            if(data.status==1){
                                alert(data.message);
                                window.location.reload();
                            }else{
                                alert(data.message);

                            }
                        }
                    })

                },function(){
                    console.log("点击了取消");
                })
            }
            </script>

    </body>
</html>