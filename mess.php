<?php

$fp = fopen("message.txt","a+");
fwrite($fp,"\n"."zzz");
fclose($fp);


$fp = fopen("message.txt","a+");
while($in=fgets($fp))
echo trim($in);

//echo "end";


?>


