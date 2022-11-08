<?php

if(isset($_GET["phpinfo"])) die(phpinfo());

echo "<pre>";

echo "<b>PHP version </b> <br>";
echo "<a href='?phpinfo'>". phpversion() . "</a><br>";

echo "<b>Git branch </b> <br>";
chdir("/var/www/html/MP07");
echo file_get_contents(".aniol_gitpull/aniol_gitpull-branch.txt");

echo "<b>Git commit info </b> <br>";
echo file_get_contents(".aniol_gitpull/aniol_gitpull-gitlog.txt");

echo "<b>Git commit files </b> <br>";
echo file_get_contents(".aniol_gitpull/aniol_gitpull-files.txt");

echo "<br>";

echo "<b>Service status </b> <br>";
echo shell_exec("systemctl status aniol_gitpull --no-pager"). "<br>";

echo "<b>Service log </b> <br>";
echo shell_exec("tail /var/log/aniol_gitpull.log"). "<br>";

echo "</pre>";
