<?php
/* Database access data. */
define('DB_SERVER', '172.31.25.123');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '*************************');
define('DB_NAME', 'imagodb');
 
/* Starting MySQL connection */
$databaselinking = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
/* Check connection, if not possible, send error message */
if($databaselinking === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
