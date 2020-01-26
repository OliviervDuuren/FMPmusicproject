<?php
include("connect.php");
$sql = "DELETE FROM users WHERE id = ".$_POST['id']."";

$result = $mysqli->query($sql);

 echo json_encode($result);
 exit;
?>
