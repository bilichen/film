<?php

return [
    // 入口自动绑定模块
    'auto_bind_module'       => true,
    // 应用调试模式
    'app_debug'              => true,
    // 应用Trace
    'app_trace'              => true,

    // 缓存
    'cache'  => [
        // 缓存类型为File
        'type'   => 'File',
        // 指定缓存目录
        'path'   => CACHE_PATH,
        //缓存前缀
        'prefix' => '',
        // 缓存有效期为永久有效
        'expire' => 0,
    ],

    //分页
    'paginate'               => [
        'type'      => 'page\Page',//分页类
        'var_page'  => 'page',
        'list_rows' => 15,
    ],

    
];