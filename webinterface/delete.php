<?php

/* Database data */
include "config.php";

/* Getting the ID from the database */
$id = $_GET['id'];

/* Delete from the table "uploaded_imagomedias the selected ID */
$del = mysqli_query($databaseconnection,"delete from uploaded_imagomedias where id = '$id'");

/* If delete was successful, close connection and move back to the "my_medias" page */
if($del)
{
    mysqli_close($databaseconnection);
    header("location:my-medias.php");
    exit;   
}
/* If delete was not successful, send error message */
else
{
    echo "Error deleting record";
}
?>