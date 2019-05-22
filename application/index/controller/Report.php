<?php
namespace app\index\controller;

use think\Controller;

class Report extends Controller
{
    public function index()
    {
        if(!session('?report')){
            $this->redirect('upload/index');
        }
        return $this->fetch();
    }

    public function download(){

        $file_dir = session('report');

        //打开文件
        $file = fopen($file_dir,'r');

        // 输入文件标签
        Header("Content-type: application/octet-stream");
        Header("Accept-Ranges: bytes");
        Header("Accept-Length:".filesize($file_dir));
        Header("Content-Disposition: attachment;filename=" . $file_dir);

        ob_clean();
        flush();

        //输出文件内容
        //读取文件内容并直接输出到浏览器
        echo fread($file, filesize($file_dir));
        fclose($file);
        exit();
    }


}
