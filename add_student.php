<?php 

include("php/connect.php");

if(isset($_POST['submit']))
{
$sql = "INSERT INTO users (surname, lastname, role, level)
    VALUES ('".$_POST["surname"]."','".$_POST["lastname"]."', 'child','".$_POST["level"]."')";

$result = mysqli_query($mysqli,$sql);
header( "Location: students.php" );
}
?>