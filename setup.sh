#!/bin/bash

sudo systemctl stop aniol_gitpull
sudo systemctl disable aniol_gitpull
sudo rm /etc/systemd/system/aniol_gitpull*
sudo rm /var/www/html/info.php

cd /var/www/html/
sudo wget https://raw.githubusercontent.com/aniollidon/gitpull-service/main/info.php
cd /etc/systemd/system/

sudo wget https://raw.githubusercontent.com/aniollidon/gitpull-service/main/aniol_gitpull.service
sudo wget https://raw.githubusercontent.com/aniollidon/gitpull-service/main/aniol_gitpull.sh
sudo wget https://raw.githubusercontent.com/aniollidon/gitpull-service/main/aniol_gitpull.timer

sudo chmod +x aniol_gitpull.sh
sudo systemctl daemon-reload
sudo systemctl enable aniol_gitpull.timer
sudo systemctl start aniol_gitpull
