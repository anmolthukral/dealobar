<?php
 $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';

$url='http://pokemonsgo.org/assets/img/chamkeela.png';
$file='tmp/myfile.png';
$ch = curl_init($url);
$fp = fopen($file, 'wb');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch,CURLOPT_TIMEOUT,1000);

curl_exec($ch);
curl_close($ch);
fclose($fp);


echo '<img src="tmpfolder/myfile.png"/>';

?>