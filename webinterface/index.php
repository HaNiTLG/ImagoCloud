<?php
/* Start the session */
session_start();
 
/* Need to check if the user already logged in. If not, send to login page */
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<!-- Frontend page -->
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ImagoCloud</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script type="text/javascript" src="main.js"></script>
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
    <div class="card">
        <h3 class="btn-title">UPLOAD IMAGES AND VIDEOS UP TO 200MB FOR FREE!</h3>
        <a <button class="upload-btn" href="/webinterface/upload-medias.php">UPLOAD NOW</button></a>
    </div>
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