<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"E:\xampp\htdocs\film\public/../application/admin\view\index\index.html";i:1511432541;s:72:"E:\xampp\htdocs\film\public/../application/admin\view\public\header.html";i:1511432541;s:70:"E:\xampp\htdocs\film\public/../application/admin\view\public\left.html";i:1511519702;s:74:"E:\xampp\htdocs\film\public/../application/admin\view\public\admin_js.html";i:1511432541;}*/ ?>
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
        <div class="layui-layout layui-layout-admin">
            <div class="layui-header header header-demo">
  <div class="layui-main">
    <a class="logo">
      品美高清后台管理
    </a>
    <ul class="layui-nav" lay-filter="">
      <li class="layui-nav-item"><img src="__STATIC__/admin/images/logo.png" class="layui-circle" style="border: 2px solid #A9B7B7;" width="35px" alt=""></li>
      <li class="layui-nav-item">
        <a href="javascript:;">admin</a>
        <dl class="layui-nav-child"> <!-- 二级菜单 -->

          <dd><a href="<?php echo url('login/logout'); ?>">退出</a></dd>
        </dl>
      </li>
      <!-- <li class="layui-nav-item">
        <a href="" title="消息">
            <i class="layui-icon" style="top: 1px;">&#xe63a;</i>
        </a>
        </li> -->
      <li class="layui-nav-item x-index"><a href="index.php">前台首页</a></li>
    </ul>
  </div>
</div>

<div class="layui-side layui-bg-black x-side">
  <div class="layui-side-scroll">
    <ul class="layui-nav layui-nav-tree site-demo-nav" lay-filter="side">
      <li class="layui-nav-item">
        <a class="javascript:;" href="javascript:;">
          <i class="layui-icon" style="top: 3px;">&#xe607;</i><cite>资讯管理</cite>
        </a>
        <dl class="layui-nav-child">
          <dd class="">
          <dd class="">
            <a href="javascript:;" _href="<?php echo url('info/index'); ?>">
              <cite>问题列表</cite>
            </a>
          </dd>
          </dd>
          <dd class="">
          <dd class="">
            <a href="javascript:;" _href="<?php echo url('index/question_del'); ?>">
              <cite>删除问题</cite>
            </a>
          </dd>
          </dd>
        </dl>
      </li>
      <li class="layui-nav-item">
        <a class="javascript:;" href="javascript:;">
          <i class="layui-icon" style="top: 3px;">&#xe634;</i><cite>影片管理</cite>
        </a>
        <dl class="layui-nav-child">
          <dd class="">
          <dd class="">
            <a href="javascript:;" _href="<?php echo url('film/index'); ?>">
              <cite>电影列表</cite>
            </a>
          </dd>
          </dd>
          <dd class="">
          <dd class="">
            <a href="javascript:;" _href="<?php echo url('tv/index'); ?>">
              <cite>电视列表</cite>
            </a>
          </dd>
          </dd>
        </dl>
      </li>
      <li class="layui-nav-item">
        <a class="javascript:;" href="javascript:;">
          <i class="layui-icon" style="top: 3px;">&#xe630;</i><cite>分类管理</cite>
        </a>
        <dl class="layui-nav-child">
          <dd class="">
            <a href="javascript:;" _href="<?php echo url('category/index'); ?>">
              <cite>分类列表</cite>
            </a>
          </dd>
        </dl>
      </li>
      <li class="layui-nav-item">
        <a class="javascript:;" href="javascript:;">
          <i class="layui-icon" style="top: 3px;">&#xe613;</i><cite>管理员管理</cite>
        </a>
        <dl class="layui-nav-child">
          <dd class="">
            <a href="javascript:;" _href="<?php echo url('manger/index'); ?>">
              <cite>管理员列表</cite>
            </a>
          </dd>
        </dl>
      </li>
      <li class="layui-nav-item">
        <a class="javascript:;" href="javascript:;">
          <i class="layui-icon" style="top: 3px;">&#xe614;</i><cite>系统设置</cite>
        </a>
        <dl class="layui-nav-child">
          <dd class="">
            <a href="javascript:;" _href="<?php echo url('sys/index'); ?>">
              <cite>系统设置</cite>
            </a>
          </dd>
          <dd class="">
            <a href="javascript:;" _href="__STATIC__/admin/sys-data.html">
              <cite>数字字典</cite>
            </a>
          </dd>
          <dd class="">
            <a href="javascript:;" _href="__STATIC__/admin/sys-shield.html">
              <cite>屏蔽词</cite>
            </a>
          </dd>
          <dd class="">
            <a href="javascript:;" _href="__STATIC__/admin/sys-log.html">
              <cite>系统日志</cite>
            </a>
          </dd>
          <dd class="">
            <a href="javascript:;" _href="__STATIC__/admin/sys-link.html">
              <cite>友情链接</cite>
            </a>
          </dd>
          <dd class="">
            <a href="javascript:;" _href="__STATIC__/admin/sys-qq.html">
              <cite>第三方登录</cite>
            </a>
          </dd>
        </dl>
      </li>
      <li class="layui-nav-item" style="height: 30px; text-align: center">
      </li>
    </ul>
  </div>

</div>

            <div class="layui-tab layui-tab-card site-demo-title x-main" lay-filter="x-tab" lay-allowclose="true">
                <div class="x-slide_left"></div>
                <ul class="layui-tab-title">
                    <li class="layui-this">
                        我的桌面
                        <i class="layui-icon layui-unselect layui-tab-close">ဆ</i>
                    </li>
                </ul>
                <div class="layui-tab-content site-demo site-demo-body">
                    <div class="layui-tab-item layui-show">
                        <iframe frameborder="0" src="<?php echo url('index/welcome'); ?>" class="x-iframe"></iframe>
                    </div>
                </div>
            </div>
            <div class="site-mobile-shade">
            </div>
        </div>
        <script src="__STATIC__/admin/js/jquery.min.js"></script>
<script src="__STATIC__/admin/lib/layui/layui.js" charset="utf-8"></script>
<script src="__STATIC__/admin/js/x-admin.js"></script>
<script src="__STATIC__/admin/js/x-layui.js" charset="utf-8"></script>

<!--引入bootstrap-->
<!--<link rel="stylesheet" type="text/css" href="__STATIC__/admin/lib/bootstrap/css/bootstrap.css" />-->
<!--<script type="text/javascript" src="__STATIC__/admin/lib/bootstrap/js/bootstrap.js"></script>-->

</body>
</html>