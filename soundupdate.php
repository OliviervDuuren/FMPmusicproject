<?php
$soundvalue1 = $_POST['soundvalueGeluid1'];
$soundvalue2 = $_POST['soundvalueGeluid2'];
$soundvalue3 = $_POST['soundvalueGeluid3'];
$soundvalue4 = $_POST['soundvalueGeluid4'];
$soundvalue5 = $_POST['soundvalueGeluid5'];
$soundvalue6 = $_POST['soundvalueGeluid6'];
$soundvalue7 = $_POST['soundvalueGeluid7'];
$soundvalue8 = $_POST['soundvalueGeluid8'];

$fp = fopen('data.txt', 'wb');

fwrite($fp, $soundvalue1);
fclose($fp);
echo $soundvalue1 ;
echo $soundvalue2 ;
echo $soundvalue3 ;
echo $soundvalue4 ;
echo $soundvalue5 ;
echo $soundvalue6 ;
echo $soundvalue7 ;
echo $soundvalue8 ;


// the content of 'data.txt' is now 123 and not 23!
?>