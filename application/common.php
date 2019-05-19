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

// 应用公共文件
if (!function_exists('alert_success')) {
    function alert_success($msg='',$url='',$time=2){
        $str='<script type="text/javascript" src="/static/assets2/js/jquery-2.2.3.min.js"></script> <script type="text/javascript" src="/static/assets2/layer/layer.js"></script>';//加载jquery和layer
        $str.='<script>
        $(function(){
            layer.msg("'.$msg.'",{icon:"6",time:'.($time*1000).'});
            setTimeout(function(){self.location.href="'.$url.'"},1000)});
    </script>';//主要方法
        return $str;
    }
}

if (!function_exists('alert_error')) {
    function alert_error($msg='',$time=1){
        $str='<script type="text/javascript" src="/static/assets2/js/jquery-2.2.3.min.js"></script> <script type="text/javascript" src="/static/assets2/layer/layer.js"></script>';//加载jquery和layer
        $str.='<script>
        $(function(){
            layer.msg("'.$msg.'",{icon:"5",time:'.($time*2000).'});
            setTimeout(function(){
                   window.history.go(-1);
            },500)
        });
    </script>';//主要方法
        return $str;
    }
}