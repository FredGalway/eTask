<?php
// Display errors
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php
$server='localhost';
// $db_host='localhost';
$username='root';
$password='root';
$database='eTask';
// $db_db = 'information_schema';
$con=mysqli_connect($server,$username,$password,$database);

if(!$con){
    echo"You're not connected";
} 
else {
    // echo "You are connected!";
}
      
?>

