#!/usr/bin/env bash
git pull origin master &&
bin/console ca:cl --env=dev &&
bin/console ca:cl --env=prod &&
chmod -R 777 var/cache &&
chmod -R 777 var/logs &&
chmod -R 777 web/uploads/
