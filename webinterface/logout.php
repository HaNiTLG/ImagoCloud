<?php
/* Initialize the session */
session_start();
 
/* Unset all of the session variables */
$_SESSION = array();
 
/* "Destroy" (delete) the session. */
session_destroy();
 
/* Redirect the user to the login page so the user can login again */
header("location: ../login.php");
exit;
?>