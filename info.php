<?php
function clean_lines($txt, $dellines = 0){
  // New line is required to split non-blank lines
  $txt=trim($txt);
  $txt = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $txt);
 if($dellines)
   for($i=1; $i < $dellines; ++$i)
    $txt = substr($txt, 0, strrpos($txt, "\n"));

 return $txt;
}

function add_links($txt){
 $out = "";
 $lines = preg_split("/\r\n|\n|\r/", $txt);
 foreach ($lines as $line){
  $split = explode("= ", $line);
  $date = $split[0];
  $out = $out . $date . " "; 
  $url = $split[1];
  $out = $out . "<a href='/MP07/$url'>$url</a><br>";
 }
 
 return $out;
}

if(isset($_GET["phpinfo"])) die(phpinfo());

if(isset($_GET["fulllog"])) die("<pre>" . file_get_contents("/var/log/aniol_gitpull.log") . "</pre>");

echo "<pre>";

echo "<b>PHP version </b> <br>";
echo "<a href='?phpinfo'>". phpversion() . "</a><br><br>";

echo "<b>MySql version </b> <br>";
echo clean_lines(shell_exec("mysql --version"))."<br><br>";
  
echo "<b>Git branch </b> <br>";
chdir("/var/www/html/MP07");
echo clean_lines(file_get_contents(".aniol_gitpull/aniol_gitpull-branch.txt"))."<br><br>";

echo "<b>Git commit info </b> <br>";
echo clean_lines(file_get_contents(".aniol_gitpull/aniol_gitpull-gitlog.txt"))."<br><br>";

echo "<b>Files </b> <br>";
echo "<a href='/MP07'>MP07</a><br><br>";

echo "<b>Git Files </b> <br>";
echo add_links(clean_lines(file_get_contents(".aniol_gitpull/aniol_gitpull-files.txt")))."<br>";

echo "<b>Timer status </b> <br>";
echo clean_lines(shell_exec("systemctl list-timers aniol_gitpull.timer"), 3)."<br><br>";
  
echo "<b>Service status </b> <br>";
echo clean_lines(shell_exec("systemctl status aniol_gitpull --no-pager"))."<br><br>";

echo "<b>Service <a href='?fulllog'>log</a> </b> <br>";
echo clean_lines(shell_exec("tail /var/log/aniol_gitpull.log"))."<br><br>";

echo "</pre>";
