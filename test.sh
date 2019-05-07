#!/bin/bash
export JAVA_HOME=/usr/local/jdk1.8.0_201
export JAVA_BIN=/usr/local/jdk1.8.0_201/bin
export PATH=$PATH:$JAVA_HOME/bin
export CLASSPATH=:$JAVA_HOME/lib/dt.jar:$JAVA_HOME/lib/tools.jar
export JAVA_HOME JAVA_BIN PATH CLASSPATHSPH
export M2_HOME=/usr/local/apache-maven-3.6.0
export PATH=$PATH:$M2_HOME/bin



#find /www/wwwroot/114.115.178.1/application/index/controller -name "*.jar"|xargs -i mv {} onlyone.jar
#jar -xvf onlyone.jar
#echo 'hello'
#find /www/wwwroot/114.115.178.1/application/index/controller -name "pom.xml" -exec cp {} /www/wwwroot/114.115.178.1/application/index/controller/result/pom.xml \
cd /home/wwwroot/default/tp5/public/upload
#mvn dependency:tree > tree.txt
#mvn dependency:tree | awk '/:tree/,/BUILD SUCCESS/' | awk 'NR > 2 { print }' | head -n -2 > tree.txt
mvn dependency:tree -DoutputType=dot | grep \> >tree.txt