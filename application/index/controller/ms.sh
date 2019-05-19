#!/bin/bash
echo '***** start' > /home/wwwroot/mavenproject/application/index/controller/log
pa=$(pwd)
echo "***** 当前目录：$pa"  >> /home/wwwroot/mavenproject/application/index/controller/log
export MAVEN_HOME=/usr/local/software/maven/apache-maven-3.6.1
export PATH=$MAVEN_HOME/bin:$PATH
# 文件存储的默认地址目录
cd $1
echo "***** 默认压缩包地址目录：$1"  >> /home/wwwroot/mavenproject/application/index/controller/log
#要解压的文件名称
zd="${2::-4}"
cd ..
gen =$(pwd)
cd udir
echo "***** 项目所在的目录：$gen"  >> /home/wwwroot/mavenproject/application/index/controller/log
unzip -q $1/$2 -d $zd
echo "***** 需要解压的文件：$1/$2"  >> /home/wwwroot/mavenproject/application/index/controller/log
echo "***** 解压后的地址：$(pwd)/$zd"  >> /home/wwwroot/mavenproject/application/index/controller/log
#找到pom.xml文件
lp="$(find $(pwd)/$zd -name 'pom.xml')"
echo "***** pom文件所在目录：$lp"  >> /home/wwwroot/mavenproject/application/index/controller/log
#获得pom.xml文件所在的根目录
ld="${lp::-7}"
#切换到pom.xml文件所在的根目录
echo "***** pom文件所在根目录：$1/$zd$ld"  >> /home/wwwroot/mavenproject/application/index/controller/log
cd $ld
echo "***** ld目录：$ld"  >> /home/wwwroot/mavenproject/application/index/controller/log
#进行依赖扫描
mvn dependency:tree>$gen/$zd.txt
echo '***** excute mvn' >> /home/wwwroot/mavenproject/application/index/controller/log
