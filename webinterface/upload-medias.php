<!DOCTYPE html>
<html>
<?php 
include("upload-medias-backend.php"); 
?>
<!-- Frontend page -->
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
					<form action="" method="POST" enctype="multipart/form-data" class="card">
					<h3 class="btn-title">UPLOAD IMAGES AND VIDEOS UP TO 200MB FOR FREE!</h3>

						<input type="file" name="file" multiple accept="image/*,audio/*,video/*" id="upload" required>
						<label for="upload">
							<i class="fa fa-file-text-o fa-3x"></i>
							<p>
								<strong><span>Browse & Choose</span></strong> medias<br>
								 to begin the upload
							</p>
						</label>
						<label></label>
						<button name="upload" class="btn">Upload</button>
					</form>
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
