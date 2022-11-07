#!/bin/bash
date
cd /var/www/html/MP07
git clean --force -d -x
git reset --hard
git pull
git log -1 --format=%cd 
echo //////////////////////
