<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"E:\xampp\htdocs\film\public/../application/admin\view\film\film_add.html";i:1511454357;s:72:"E:\xampp\htdocs\film\public/../application/admin\view\public\header.html";i:1511432541;s:74:"E:\xampp\htdocs\film\public/../application/admin\view\public\admin_js.html";i:1511432541;}*/ ?>
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



        <div class="x-body">

            <form  action="<?php echo url('upload'); ?>" enctype="multipart/form-data" method="post">

                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>影视图片
                    </label>
                    <div class="layui-input-inline">
                      <div class="site-demo-upbar">
                        <input type="file" name="image"  id="image">
                      </div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>片名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" lay-verify="required"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="selectAll">
                    <label for="link" class="select_item">
                        <span class="x-red">*</span>影视类型：
                    </label>
                    <div class="layui-input-inline">
                        <select name="type">
                            <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                 <option value="<?php echo $v['name']; ?>"><?php echo $v['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>

                    <label for="link" class="select_item">
                        <span class="x-red">*</span>出品国家：
                    </label>
                    <div class="layui-input-inline">
                        <select name="country">
                            <?php if(is_array($country) || $country instanceof \think\Collection || $country instanceof \think\Paginator): $i = 0; $__LIST__ = $country;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                  <option value="<?php echo $v['name']; ?>"><?php echo $v['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>

                    <label for="link" class="select_item">
                        <span class="x-red">*</span>影片格式：
                    </label>
                    <div class="layui-input-inline">
                        <select name="format">
                            <?php if(is_array($format) || $format instanceof \think\Collection || $format instanceof \think\Paginator): $i = 0; $__LIST__ = $format;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $v['name']; ?>"><?php echo $v['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>

                <div class="selectAll">
                    <label for="link" class="select_item">
                        <span class="x-red">*</span>上映年份：
                    </label>
                    <div class="layui-input-inline">
                        <select name="release">
                            <?php if(is_array($release) || $release instanceof \think\Collection || $release instanceof \think\Paginator): $i = 0; $__LIST__ = $release;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $v['time']; ?>"><?php echo $v['time']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>

                    <label for="link" class="select_item">
                        <span class="x-red">*</span>保存盘符：
                    </label>
                    <div class="layui-input-inline">
                        <select name="drive">
                            <?php if(is_array($drive) || $drive instanceof \think\Collection || $drive instanceof \think\Paginator): $i = 0; $__LIST__ = $drive;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                 <option value="<?php echo $v['name']; ?>"><?php echo $v['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>



                <div class="layui-form-item">
                    <label for="size" class="layui-form-label">
                        <span class="x-red">*</span>影片大小
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="size" name="size" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>评分
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="score" name="score" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>描述
                    </label>
                    <div class="layui-input-inline">
<!--                        <input type="tex" id="desc" name="desc" required="" lay-verify="required"-->
<!--                        autocomplete="off" class="layui-input">-->
                        <textarea rows="3" cols="50" id="desc" name="desc">

                        </textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button type="submit"  class="layui-btn" lay-filter="add" lay-submit="">
                        增加
                    </button>
                </div>
            </form>
        </div>
        <script src="__STATIC__/admin/js/jquery.min.js"></script>
<script src="__STATIC__/admin/lib/layui/layui.js" charset="utf-8"></script>
<script src="__STATIC__/admin/js/x-admin.js"></script>
<script src="__STATIC__/admin/js/x-layui.js" charset="utf-8"></script>

<!--引入bootstrap-->
<!--<link rel="stylesheet" type="text/css" href="__STATIC__/admin/lib/bootstrap/css/bootstrap.css" />-->
<!--<script type="text/javascript" src="__STATIC__/admin/lib/bootstrap/js/bootstrap.js"></script>-->

        <script src="./js/x-layui.js" charset="utf-8">
        </script>
<!--        <script>-->
<!--            layui.use(['form','layer','upload'], function(){-->
<!--                $ = layui.jquery;-->
<!--              var form = layui.form()-->
<!--              ,layer = layui.layer;-->
<!---->
<!---->
<!--                  //图片上传接口-->
<!--                  layui.upload({-->
<!--    //                url: '<?php echo url("banner/upload"); ?>' //上传接口-->
<!--    //                ,success: function(res){ //上传成功后的回调-->
<!--    //                    console.log(res);-->
<!--    //                  $('#LAY_demo_upload').attr('src',res.url);-->
<!--    //                }-->
<!--                  });-->
<!---->
<!--            });-->
<!--        </script>-->

    </body>

</html>