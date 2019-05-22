<?php
/**
 * Created by PhpStorm.
 * User: yym
 * Date: 2019-04-15
 * Time: 10:54
 */
$dir = "/home/wwwroot/mavenproject/application/index/controller";
$name = "answer-1.jar";
system("sudo bash ms.sh"." ".$dir." ".$name,$result);
print $result;//输出命令的结果状态码
