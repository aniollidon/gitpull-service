#!/bin/bash
date
cd /var/www/html/MP07
git clean --force -d -x
git reset --hard
git pull
git log -1 --format=%cd 
git rev-parse --abbrev-ref HEAD > /var/log/aniol_gitpull-branch.txt
git log -1 > /var/log/aniol_gitpull-gitlog.txt
git ls-tree -r --name-only HEAD | while read filename; do  echo "$(git log -1 --format="%ad" -- $filename) $filename"; done  > /var/log/aniol_gitpull-files.txt
echo //////////////////////
