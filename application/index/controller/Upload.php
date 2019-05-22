<?php
namespace app\index\controller;

use think\Controller;

class Upload extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function uoploadfile(){
        // 获取表单上传文件
        $file = request()->file('file');
        if (empty($file)) {
            return alert_error('未检测到文件，请重新上传');
        }

        // 移动到框架应用根目录/public/uploads/ 目录下
        $time1 = date('Ymd',time());
        $time2 = date('YmdHis',time());
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'. DS . $time1,$time2 . '_' . $file->getInfo()['name']);

        $dir = 'uploads/'. $time1;
        $filename = $time2 . '_' . $file->getInfo()['name'];
        $data = $this->getReport($dir,$filename);

        //获取表单扫描选项
        $param = input('post.');
        $option = $param['scanoption'];

        if ($data['code']== 0) {
            $report = $data['url'];
            if(empty($report)){
                return alert_error('生成报告失败, 请重新上传工程文件！');
            }
            session('report',$report);
            if($option == 0){
                return alert_success('正在扫描中，即将为您生成依赖报告！','/index/report/index');
            }else if($option == 1){
                return alert_success('正在扫描中，即将为您生成漏洞报告！','/index/index/index');
            }else if($option == 2){
                return alert_success('正在扫描中，即将为您生成License报告！','/index/index/index');
            }else if($option == 3){
                return alert_success('正在扫描中，即将为您生成热度报告！','/index/index/index');
            }
        }else {
            // 上传失败获取错误信息
            $this->error($file->getError());
        }
    }
    public function getReport($d,$filename){
        $dir=$d;
        $drep= $d."/result";
        $shdir = "/home/wwwroot/mavenproject/application/index/controller/usesh";
        $name = "$filename";
        $report = explode(".", $name);
        system("sudo bash"." ".$shdir."/ms.sh"." ".$dir." ".$name." "."2>&1",$result);
        if($result == 0){
            $data =array(
                'code' => 0,
                'url' => $drep."/".$report[0].".txt"
            );
            return $data;
        }else{
            $data =array(
                'code' => 1
            );
            return $data;
        }
    }
}
