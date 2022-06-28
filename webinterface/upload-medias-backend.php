<?php 

/* Start the session */
session_start();
 
/* Need to check if the user already logged in. If not, send to login page */
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

include 'config.php';
/* Setting up the parameters (link, link_status, token) */
$databaselinking = "";
$databaselinking_status = "display: none;";

$token = "";


/* Getting from the form the uploaded file and define the media */
if (isset($_POST['upload'])) {
	/* Declaring the variables */
	/* Moving the media to the EFS directory */
	$location = "../imagocloudefs/";
	/* Set a new name and unique name so there will be no issue on duplicated medias */
	$file_new_name = date("dmy") . time() . $_FILES["file"]["name"];
	/* Getting the uploaded file name and temp name */
	$file_name = $_FILES["file"]["name"];
	$file_temp = $_FILES["file"]["tmp_name"];
	/* Getting the size of the file (currently not fully functional) */
	$file_size = $_FILES["file"]["size"]/1024/1024;
	/* Getting the date when the file hsa been uploaded */
	$upload_date = date('Y-m-d');
	/* Getting the file token (must be unique) */
	$file_token = uniqid();
	/* Getting the session of the logged in user */
	$file_user = $_SESSION["username"];
	/* The download URL will be the new name of the file with its token */
	$file_link = $base_url . "download.php?token=" . $file_token;

	/* Since we allow up to 200MB we can check if the size of 200MB has been reached or not. Deny files bigger than 200MB */
	if ($file_size > 209715200) {
		echo "<script>alert('The file is bigger than 200MB')</script>";
	} else {
		/* Else if it is below 200MB, insert all the values to the SQL databse */
		$sql = "INSERT INTO uploaded_imagomedias (name, new_name, token, file_size, username, upload_date, link)
				VALUES ('$file_name', '$file_new_name', '$file_token', '$file_size', '$file_user', '$upload_date', '$file_link')";
		$result = mysqli_query($databaseconnection, $sql);
		if ($result) {
			/* If we get a result from the database, inform the user that the file has been successfully uploaded */
			move_uploaded_file($file_temp, $location . $file_new_name);
			echo "<script>alert('Your media has been successfully uploaded, check your media at my medias.')</script>";
			/* Select id from database */
			$sql = "SELECT id FROM uploaded_imagomedias ORDER BY id DESC";
			$result = mysqli_query($databaseconnection, $sql);
			if ($row = mysqli_fetch_assoc($result)) {
				/* Key token id and pin */
				$databaselinking = $base_url . "download.php?token=" . $file_token;
				$databaselinking_status = "display: block;";
			}
		} else {
			/* Else if there is an error at the database, display the error */
                        var_dump($databaseconnection->error);
			echo "<script>alert(".$databaseconnection->error.")</script>";
		}
	}
}

?>