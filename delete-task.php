<?php

// Display errors
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php
// for getting again $con value
include_once "./db_connect.php";

// for getting URL id number value from : href="./delete.php?id='.$row["task_ID"].'
$id = $_GET['id'];
echo $id;

// No coma '' with sql functions
$deleteQuery = "DELETE FROM tasks WHERE task_ID = $id";
$result_task=mysqli_query($con, $deleteQuery);
header("location:./index.php");

?>