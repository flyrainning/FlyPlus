# Develop4Docker

开发测试环境Docker版，包括nginx，php环境，数据库，redis，自带phpMyAdmin

# run.sh

启动指向构建目录`dist`的运行环境

# run_src.sh

启动直接指向源代码目录`src`的运行环境

> 需要docker和docker-compose

数据库用户名密码：root root


访问地址 http://localhost

phpMyAdmin 地址 http://localhost:8080

代码内服务域名

- redis
- mysql


> `docker_mirror.sh`为添加 docker hub 阿里云镜像源脚本，可加速镜像拉取
