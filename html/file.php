<?php
$myfile = fopen("testx.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
//touch("/var/www/html/newfile.txt");
//chown("/var/www/html/testx","shreya");
//chmod("/var/www/html/testx.txt",0777);
//return true;
?> 


