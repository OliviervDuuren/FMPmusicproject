<?php 

include("php/connect.php");

if(isset($_POST['level']))
{
$sql = "INSERT INTO users (level)
    VALUES ('".$_POST["level"]."') ";

if (mysqli_query($mysqli, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

$result = mysqli_query($mysqli,$sql);
header( "Location: students.php" );
}


?>