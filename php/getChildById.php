<?php
include("connect.php");

$sql = "SELECT * FROM users WHERE id = ".$_POST['id']."";

$result = $mysqli->query($sql);
$row = mysqli_fetch_assoc($result);

 echo json_encode($row);
 exit;
?>
