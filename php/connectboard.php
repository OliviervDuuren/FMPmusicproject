<?php

//login path protection
if (!isset($_SESSION['username'])) {
    header("location: login.php");
  }

$status = "Niet verbonden";

$fp = fopen('boardinfo.txt', 'wb');
fwrite($fp, $status);
fclose($fp);
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
