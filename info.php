<?php

if(isset($_GET["phpinfo"])) die(phpinfo());

echo "<pre>";

echo "<b>PHP version </b> <br>";
echo "<a href='?phpinfo'>". phpversion() . "</a><br>";

echo "<b>Git branch </b> <br>";
chdir("/var/www/html/MP07");
echo shell_exec("git rev-parse --abbrev-ref HEAD");

echo "<b>Git commit info </b> <br>";
echo shell_exec("git log -1"). "<br>";

echo "<b>Git commit files </b> <br>";
echo shell_exec('git ls-tree -r --name-only HEAD | while read filename; do  echo "$(git log -1 --format="%ad" -- $filename) $filename"; done');

echo "<br>";

echo "<b>Service status </b> <br>";
echo shell_exec("systemctl status aniol_gitpull --no-pager"). "<br>";

echo "<b>Service log </b> <br>";
echo shell_exec("tail -5 /var/log/aniol_gitpull.log"). "<br>";

