#!/usr/bin/env bash
git pull origin master &&
bin/console ca:cl --env=dev &&
bin/console ca:cl --env=prod &&
bin/console cache:warmup --env=prod &&
chmod -R 777 var/cache &&
chmod -R 777 var/logs &&
chmod -R 777 web/uploads/ &&
chmod -R 777 web/media &&
sh install_front_deps.sh
service httpd restart
