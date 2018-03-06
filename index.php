<?php
#$ip = getenv('HTTP_CLIENT_IP')?:
##echo $ip;
#echo '</br>';
##echo $_SERVER;
##echo $_SERVER['SERVER_NAME'].'</br>';
##echo $_SERVER['REMOTE_ADDR'].'</br>';
echo '<html>';
echo '<head></head>';
echo '<body>';
echo '<p style="font-size:46px; color:red; margin:0; position:absolute; top:50%; left:50%; margin-right:-50%;">'; 
echo $_SERVER['SERVER_ADDR'].'</br>';
echo $_SERVER['SERVER_SOFTWARE'].'</br>'; 
echo '</p>';
echo '</body>';
echo '</html>';
##echo $_SERVER['SERVER_NAME'].'</br>';
?>