<?php

if(isset($_GET["phpinfo"])) die(phpinfo());

if(isset($_GET["fulllog"])) die("<pre>" . file_get_contents("/var/log/aniol_gitpull.log") . "</pre>");

echo "<pre>";

echo "<b>PHP version </b> <br>";
echo "<a href='?phpinfo'>". phpversion() . "</a><br>";

echo "<b>MySql version </b> <br>";
echo shell_exec("mysql --version");
  
echo "<b>Git branch </b> <br>";
chdir("/var/www/html/MP07");
echo file_get_contents(".aniol_gitpull/aniol_gitpull-branch.txt");

echo "<b>Git commit info </b> <br>";
echo file_get_contents(".aniol_gitpull/aniol_gitpull-gitlog.txt");

echo "<b>Git commit files </b> <br>";
echo file_get_contents(".aniol_gitpull/aniol_gitpull-files.txt");

echo "<br>";

echo "<b>Timer status </b> <br>";
echo shell_exec("systemctl list-timers aniol_gitpull.timer"). "<br>";
  
echo "<b>Service status </b> <br>";
echo shell_exec("systemctl status aniol_gitpull --no-pager"). "<br>";

echo "<b>Service <a href='?fulllog'>log</a> </b> <br>";
echo shell_exec("tail /var/log/aniol_gitpull.log"). "<br>";

echo "</pre>";
