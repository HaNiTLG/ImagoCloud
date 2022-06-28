<?php
session_start();
 
/* Check if the user is logged in, if not then redirect him to login page */
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

$file_user = $_SESSION["username"];

include 'config.php';

?>


<!DOCTYPE html>
<!-- Frontend page -->
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ImagoCloud</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script type="text/javascript" src="main.js"></script>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="main-interface.css">
</head>
<header>
    <a class="title" href="/webinterface/"><h1>ImagoCloud-Webinterface</h1></a>
    <div class=" header">
        <a class="btn" href="/webinterface/">Dashboard</a>
        <a class="btn" href="upload-medias.php">Upload Medias</a>
        <a class="btn" href="my-medias.php">My Medias</a>
		<a class="btn" href="my-medias.php">My Account (<?php echo htmlspecialchars($_SESSION["username"]); ?>)</a>
		<a class="btn" href="logout.php">Logout</a>
    </div>
</header>

<body class="body">
        <section class="card">
            <section class="user_content">
				<!-- Creating each table (table "header") -->
                <table>
                    <tr>
                        <td>Media Name</td>
                        <td>Uploaded at</td>
                        <td>Public View</td>
						<td>Direct Download</td>
                        <td>Delete Media</td>
                    </tr>
					<!-- Getting a list of the uploaded_imagomedias SQL table from the specific loggen in user -->
                    <?php
                    $records = mysqli_query($databaseconnection,"select * from uploaded_imagomedias where username='$file_user'");
                    while($data = mysqli_fetch_array($records)){
                    ?>
					<!-- Building a list of the results from the database and viewing the list in the frontend page for the user -->
                      <tr>
                        <td><?php echo $data['name']; ?></td>
						<td><?php echo $data['upload_date']; ?></td>  						
                        <td><a class="down" href="../imagocloudefs/<?php echo $data['new_name']; ?>" view="<?php echo $data['name']; ?>">Public View</a></td>
						<td><a class="down" href="../imagocloudefs/<?php echo $data['new_name']; ?>" download="<?php echo $data['name']; ?>">Direct Download</a></td>
                       <td><a class="delete" href="delete.php?id=<?php echo $data['id']; ?>">Delete Media</a></td>
                      </tr> 
                    <?php
                    }
                    ?>
                </table>
            </section>
        </section>
    <div class="footer">
        <div class="links">
            <a class="link" onclick="show()">IMPRINT</a>
            <a class="link" onclick="show()">PRIVACY</a>
            <a class="link" onclick="show()">CONTACT</a>
            <a class="link" href="/webinterface/">WEBINTERFACE</a>
        </div>
    </div>
</body>
</html>
</html>