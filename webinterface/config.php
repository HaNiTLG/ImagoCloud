<?php 
/* Database access data. */
$server = "172.31.25.123";
$dbuser = "root";
$dbpass = "*************************";
$database = "imagodb";

/* Starting MySQL connection */
$databaseconnection = mysqli_connect($server, $dbuser, $dbpass, $database);

/* Check connection, if not possible, send error message */
if (!$databaseconnection) {
    die("<script>alert('Connection Failed.')</script>");
}
/* Website URL */
$base_url = "https://imagocloud.gutti.rocks/webinterface/";

?>
