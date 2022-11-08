#!/bin/bash
date
cd /var/www/html/MP07
git clean --force -d -x --quiet
git reset --hard --quiet
git pull
git log -1 --format=%cd 
mkdir -p .aniol_gitpull 
git rev-parse --abbrev-ref HEAD > .aniol_gitpull/aniol_gitpull-branch.txt
git log -1 > .aniol_gitpull/aniol_gitpull-gitlog.txt
echo "" > .aniol_gitpull/aniol_gitpull-files.txt
git ls-tree -r --name-only HEAD | while read filename; do  echo "$(git log -1 --format="%ad" -- $filename) $filename"  >> .aniol_gitpull/aniol_gitpull-files.txt ; done
echo //////////////////////
