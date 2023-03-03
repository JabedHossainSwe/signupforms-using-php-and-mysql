<?php 
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = ''; 
$DATABASE = 'signupforms';

$conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if (!$conn) {
    die("The database wasn't created successfully cause of this error --->".mysqli_connect_error()); 
}
?>